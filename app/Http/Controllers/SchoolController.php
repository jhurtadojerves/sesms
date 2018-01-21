<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::where('id', '!=', 0)->with('faculty')->get();
        return view('admin.schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        return view('admin.schools.create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = School::create(
            $request->all()
        );

        \Alert::success('La escuela fue creada correctamente');
        return redirect(route('admin.schools.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        $faculties = Faculty::all()->pluck('name', 'id')->toArray();
        return view('admin.schools.edit', compact(['school', 'faculties']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $school->code = $request->get('code');
        $school->name = $request->get('name');
        $school->foundation = $request->get('foundation');
        $school->acronym = $request->get('acronym');
        $school->id_faculty = $request->get('id_faculty');
        $school->save();

        \Alert::success('La escuela se actualizó correctamente');
        return redirect(route('admin.schools.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        $name = $school->name;
        $school->delete();
        \Alert::warning("La escuela $school->name se eliminó correctamente");
        return redirect(route('admin.schools.index'));
    }
}
