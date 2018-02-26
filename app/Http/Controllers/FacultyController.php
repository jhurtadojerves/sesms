<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();

        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculty = new Faculty($request->all());
        $faculty->save();

        \Alert::success('La facultad fue creada correctamente');
        return redirect(route('admin.faculties.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('admin.faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $faculty->code = $request->get('code');
        $faculty->name = $request->get('name');
        $faculty->foundation = $request->get('foundation');
        $faculty->acronym = $request->get('acronym');
        $faculty->save();

        \Alert::success('La facultad se actualizó correctamente');
        return redirect(route('admin.faculties.index'));
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        \Alert::warning('La facultad se eliminó correctamente');
        return redirect(route('admin.faculties.index'));
    }
}
