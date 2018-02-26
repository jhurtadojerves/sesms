<?php

namespace App\Http\Controllers;

use App\Scenario;
use App\Syllable;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        $stage_types = [
            'REALES' => 'Real',
            'VIRTUALES' => 'Virtual',
            'AÚLICO' => 'Aúlico',
        ];
        return view('syllable.scenarios.create', compact(['syllable', 'stage_types']));
    }

    public function store(Request $request, Syllable $syllable)
    {
        $request_array = $request->all();
        $request_array['id_syllable'] = $syllable->id;
        $stage = Scenario::create($request_array);
        \Alert::success("El Escenario de Aprendizaje $stage->name se registró correctamente");
        return redirect(route('syllable.show', $syllable));
    }

    public function show(Scenario $scenario)
    {
        //
    }

    public function edit(Syllable $syllable, Scenario $stage)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        $stage_types = [
            'REALES' => 'Real',
            'VIRTUALES' => 'Virtual',
            'AÚLICO' => 'Aúlico',
        ];
        return view('syllable.scenarios.edit', compact(['syllable', 'stage_types', 'stage']));
    }

    public function update(Request $request, Syllable $syllable, Scenario $stage)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        $stage->update($request->all());
        \Alert::success("El Escenario de Aprendizaje $stage->name se actualizó correctamente");
        return redirect(route('syllable.show', $syllable));
    }

    public function destroy(Scenario $scenario)
    {
        //
    }
}
