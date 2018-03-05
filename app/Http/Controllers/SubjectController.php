<?php

namespace App\Http\Controllers;

use App\Mesh;
use App\Period;
use App\Subject;
use App\Syllable;
use App\Ups;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectController extends Controller
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


    public function create(Mesh $mesh)
    {
        return view('admin.meshes.subjects.create', compact('mesh'));
    }

    public function store(Request $request, Mesh $mesh)
    {
        $subject = new Subject();
        $subject->id_mesh = $mesh;
        $subject->code = $request->get('code');
        $subject->name = $request->get('name');
        $subject->hp = $request->get('hp');
        $subject->ha =$request->get('ha');
        $subject->ht = $request->get('ht');
        $subject->credits = $request->get('credits');
        $subject->prerequisites = $request->get('prerequisites');
        $subject->corequisites = $request->get('corequisites');
        $subject->level = $request->get('level');
        $subject->training_field = $request->get('training_field');

        $mesh->subjects()->save($subject);

        \Alert::success("La asignatura $subject->name se creó correctamente");
        return redirect(route('admin.meshes.show', $mesh));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Mesh $mesh, Subject $subject)
    {
        $upss = $subject->upss()->with(['user', 'period'])->get();

        return view('admin.meshes.subjects.show', compact(['mesh', 'subject', 'upss']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }

    public function teacher(Mesh $mesh, Subject $subject)
    {
        $periods = Period::whereStatus(true)->pluck('name', 'id')->toArray();
        $teachers = User::whereType('teacher')->pluck('name', 'id')->toArray();
        return view('admin.meshes.subjects.teacher', compact(['mesh', 'subject', 'periods', 'teachers']));
    }

    public function teacherStore(Request $request, Mesh $mesh, Subject $subject)
    {
        $ups = new Ups();
        $ups->id_user = $request->get('id_user');
        $ups->id_period = $request->get('id_period');
        $ups->parallel = $request->get('parallel');
        $ups->id_subject = $subject->id;
        $ups->save();

        $syllable = new Syllable();
        $syllable->id_ups = $ups->id;
        $syllable->sede = "Macas";
        $syllable->delivery = Carbon::now();
        $syllable->comment = '.';
        $syllable->save();

        \Alert::success("El docente se agregó correctamente");
        return redirect(route('admin.meshes.subjects.show', [$mesh, $subject]));
    }

}
