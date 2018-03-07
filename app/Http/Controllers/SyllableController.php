<?php

namespace App\Http\Controllers;

use App\Staff;
use App\Syllable;
use App\Unit;
use App\Ups;
use App\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use iio\libmergepdf\Merger;

class SyllableController extends Controller
{

    public function index()
    {
        $periods = Period::where('status', 1)->pluck('id');
        if (Auth::user()->isCoordinator())
            $upss = Ups::whereIn('id_period', $periods)->pluck('id');
        else
            $upss = Ups::where('id_user', Auth::user()->id)->whereIn('id_period', $periods)->pluck('id');
        $syllables = Syllable::whereIn('id_ups', $upss )->with('ups')->get();
        return view('syllable.index', compact('syllables'));
    }

    public function create()
    {
        $upss = Ups::where('id_user', Auth::user()->id)
            ->where('id_period', 1)->with('subject')->get();

        return view('syllable.create', compact('upss'));
    }

    public function store(Request $request)
    {
        $syllable = new Syllable([
            'sede' => $request->get('sede'),
            'delivery' => $request->get('delivery'),
            'id_ups' => $request->get('id_ups'),
            'comment' => '.',
        ]);

        $syllable->save();
        \Alert::success('Sílabo agregado correctamente');
        return redirect(route('syllable.index'));

    }

    public function show(Syllable $syllable)
    {

        $syllable->load('ups', 'units', 'ups.subject', 'bibliographies', 'scenarios')->get();
        return view('syllable.show', compact('syllable'));
    }

    public function edit(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.edit', compact(['syllable', 'unit']));
    }

    public function update(Request $request, Syllable $syllable)
    {
        $syllable->sede = $request->get('sede');
        $syllable->delivery = $request->get('delivery');
        $syllable->save();

        \Alert::success("El sílabo se actualizó correctamente");
        return redirect(route('syllable.show', $syllable));
    }

    public function destroy(Syllable $syllable)
    {
        //
    }

    public function print(Syllable $syllable)
    {
        if($syllable->approved or Auth::user()->type == 'coordinator')
        {
            $syllable->load('ups', 'units', 'ups.subject', 'bibliographies', 'scenarios')->get();
            $coordinator = Staff::where('position', 'coordinator')->first();
            $coordinator->load('user');
            $director = Staff::where('position', 'coordinator')->first();
            $director->load('user');
            $real = $syllable->scenarios()->where('type', '=', 'REALES')->get();
            $virtual = $syllable->scenarios()->where('type', '=', 'VIRTUALES')->get();
            $aulico = $syllable->scenarios()->where('type', '=', 'AÚLICO')->get();

            $size = 0;

            if ((count($real) >= count($virtual)) and count($real) >= count($aulico))
                $size = count($real);
            if ((count($virtual) >= count($real)) and count($virtual) >= count($aulico))
                $size = count($virtual);
            if ((count($aulico) >= count($real)) and count($aulico) >= count($virtual))
                $size = count($aulico);

            $view =  \View::make('syllable.report.show', compact(['syllable', 'virtual', 'real', 'aulico', 'size', 'coordinator', 'director']))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view)->setPaper('a4')->setWarnings(false);
            //return view('syllable.report.show', compact('syllable'));
            return $pdf->stream('report');
        }
        else {
            \Alert::danger('Para poder imprimir un reporte es necesario que este sea revisado y aprobado por el coordinador académico');
            return redirect(route('syllable.index'));
        }

    }

    public function print_merge(Syllable $syllable)
    {
        if($syllable->approved or Auth::user()->type == 'coordinator')
        {
            $syllable->load('ups', 'units', 'ups.subject', 'bibliographies', 'scenarios')->get();
            $coordinator = Staff::where('position', 'coordinator')->first();
            $coordinator->load('user');
            $director = Staff::where('position', 'coordinator')->first();
            $director->load('user');
            $real = $syllable->scenarios()->where('type', '=', 'REALES')->get();
            $virtual = $syllable->scenarios()->where('type', '=', 'VIRTUALES')->get();
            $aulico = $syllable->scenarios()->where('type', '=', 'AÚLICO')->get();

            $size = 0;

            if ((count($real) >= count($virtual)) and count($real) >= count($aulico))
                $size = count($real);
            if ((count($virtual) >= count($real)) and count($virtual) >= count($aulico))
                $size = count($virtual);
            if ((count($aulico) >= count($real)) and count($aulico) >= count($virtual))
                $size = count($aulico);

            $view_first =  \View::make('syllable.report.first', compact(['syllable', 'virtual', 'real', 'aulico', 'size', 'coordinator', 'director']))->render();
            $first_pdf = \App::make('dompdf.wrapper');
            $first_pdf->loadHTML($view_first)->setPaper('a4')->setWarnings(false);
            //$first_pdf->render();

            $view_second =  \View::make('syllable.report.second', compact(['syllable', 'virtual', 'real', 'aulico', 'size', 'coordinator', 'director']))->render();
            $second_pdf = \App::make('dompdf.wrapper');
            $second_pdf->loadHTML($view_second)->setPaper('a4', 'landscape')->setWarnings(false);
            //$second_pdf->render();

            $view_third =  \View::make('syllable.report.third', compact(['syllable', 'virtual', 'real', 'aulico', 'size', 'coordinator', 'director']))->render();
            $third_pdf = \App::make('dompdf.wrapper');
            $third_pdf->loadHTML($view_third)->setPaper('a4')->setWarnings(false);
            //$third_pdf->render();

            $merger = new Merger;
            $merger->addRaw($first_pdf->output());
            $merger->addRaw($second_pdf->output());
            $merger->addRaw($third_pdf->output());
            $name = $syllable->ups->subject->name . " " .Carbon::now();
            $hash_name = hash('md5', $name);

            file_put_contents("$hash_name.pdf", $merger->merge());
            return response()->file("$hash_name.pdf");
            //return $first_pdf->stream('report');
        }
        else {
            \Alert::danger('Para poder imprimir un reporte es necesario que este sea revisado y aprobado por el coordinador académico');
            return redirect(route('syllable.index'));
        }

    }
}
