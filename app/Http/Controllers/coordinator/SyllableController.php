<?php

namespace App\Http\Controllers\coordinator;

use App\Http\Controllers\Controller;

use App\{Syllable, Ups, Period, User, Unit};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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

    public function show(Period $period, User $user, Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject', 'bibliographies', 'scenarios')->get();
        return view('coordinator.syllables.show', compact(['syllable', 'period', 'user']));
    }

    public function edit(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.edit', compact(['syllable', 'unit']));
    }

    public function update(Request $request, Period $period, User $user, Syllable $syllable)
    {
        $syllable->comment = $request->get('comment');
        if($request->get('approved'))
            $syllable->approved = $request->get('approved');
        else
            $syllable->approved = 0;
        $syllable->save();

        \Alert::success("El comentario se agregó correctamente");
        return redirect(route('coordinator.syllable.show', [$period, $user, $syllable]));
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

            $view =  \View::make('syllable.report.show', compact(['syllable', 'virtual', 'real', 'aulico', 'size']))->render();
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
}
