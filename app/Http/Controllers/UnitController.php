<?php

namespace App\Http\Controllers;

use App\Syllable;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.units.create', compact('syllable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllable $syllable)
    {
        $unit = new Unit();
        $unit->name = $request->get('name');
        $unit->objetive = $request->get('objetive');
        $unit->achievement = $request->get('achievement');
        $unit->methodological_strategy = $request->get('methodological_strategy');
        $unit->resources = $request->get('resources');
        $unit->classroom_activities = $request->get('classroom_activities');
        $unit->autonomous_activities = $request->get('autonomous_activities');

        $unit->id_syllable = $syllable->id;
        $unit->save();
        \Alert::success("La unidad $unit->name se agregó correctamente");
        return redirect(route('syllable.show', $syllable));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Syllable $syllable, Unit $unit)
    {
        $unit->load(['topics', 'syllable', 'syllable.ups', 'syllable.ups.subject']);

        return view('syllable.units.show', compact(['unit', 'syllable']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
