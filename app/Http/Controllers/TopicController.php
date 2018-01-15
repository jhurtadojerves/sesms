<?php

namespace App\Http\Controllers;

use App\{Topic, Syllable, Unit};
use Illuminate\Http\Request;

class TopicController extends Controller
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

    public function create(Syllable $syllable, Unit $unit)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.units.topics.create', compact(['syllable', 'unit']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Syllable $syllable, Unit $unit)
    {
        $topic = new Topic();
        $topic->name = $request->get('name');
        $topic->subtopics = $request->get('subtopics');
        $topic->id_unit = $unit->id;
        $topic->save();
        $syllable->load('ups', 'units', 'ups.subject')->get();
        \Alert::success("El tema $topic->name se agregó correctamente");
        return redirect(route('syllable.unit.show', [$syllable, $unit]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
