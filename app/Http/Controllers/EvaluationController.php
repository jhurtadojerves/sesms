<?php

namespace App\Http\Controllers;

use App\Evaluation;
use App\Syllable;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject', 'evaluations')->get();
        return view('syllable.evaluations.create', compact('syllable'));
    }

    public function store(Request $request, Syllable $syllable)
    {
        $request_all = $request->all();
        $request_all['id_syllable'] = $syllable->id;
        foreach ($request_all as &$item) {
            if (!$item)
                $item = 0;
        }
        $evaluations = $syllable->evaluations;
        $first = 0;
        $second = 0;
        $third = 0;
        $principal = 0;
        $recovery = 0;
        foreach ($evaluations as $evaluation) {
            $first += $evaluation->first;
            $second += $evaluation->second;
            $third += $evaluation->third;
            $principal += $evaluation->principal;
            $recovery += $evaluation->recovery;
        }

        $yes_or_not = True;

        $first += $request_all['first'];
        $first += $request_all['second'];
        $first += $request_all['third'];
        $first += $request_all['principal'];
        $first += $request_all['recovery'];
        if ($first > 8)
        {
            \Alert::danger("No puedes sobrepasar de 8 puntos en el primer parcial");
            $yes_or_not = False;
        }
        if ($second > 10)
        {
            \Alert::danger("No puedes sobrepasar de 10 puntos en el segundo parcial");
            $yes_or_not = False;
        }
        if ($third > 10)
        {
            \Alert::danger("No puedes sobrepasar de 10 puntos en el tercer parcial");
            $yes_or_not = False;
        }
        if ($principal > 12)
        {
            \Alert::danger("No puedes sobrepasar de 12 puntos en el examen principal");
            $yes_or_not = False;
        }
        if ($principal > 12)
        {
            \Alert::danger("No puedes sobrepasar de 20 puntos en el examen de suspension");
            $yes_or_not = False;
        }


        if($yes_or_not)
        {
            $evaluation = Evaluation::create($request_all);
            \Alert::success("La actividad $evaluation->activity se registró correctamente");
        }
        return redirect(route('syllable.show', $syllable));
    }

    public function show(Evaluation $evaluation)
    {
        //
    }

    public function edit(Syllable $syllable, Evaluation $evaluation)
    {
        $syllable->load('ups', 'units', 'ups.subject', 'evaluations')->get();
        return view('syllable.evaluations.edit', compact(['syllable', 'evaluation']));
    }

    public function update(Request $request, Syllable $syllable, Evaluation $evaluation)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        $evaluation->update($request->all());
        \Alert::success("La actividad $evaluation->activity  se actualizó correctamente");
        return redirect(route('syllable.show', $syllable));
    }

    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
