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
        $evaluation = Evaluation::create($request_all);
        \Alert::success("La actividad $evaluation->activity se registró correctamente");
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
