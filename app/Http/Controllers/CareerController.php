<?php

namespace App\Http\Controllers;

use App\Career;
use App\School;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\CutArrayStub;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::where('id', '!=', 0)->with('school')->get();
        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        return view('admin.careers.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = Career::create(
            $request->all()
        );

        \Alert::success('La carrera fue creada correctamente');
        return redirect(route('admin.careers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        $schools = School::all()->pluck('name', 'id')->toArray();
        return view('admin.careers.edit', compact(['career', 'schools']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $career->code = $request->get('code');
        $career->name = $request->get('name');
        $career->foundation = $request->get('foundation');
        $career->acronym = $request->get('acronym');
        $career->id_school = $request->get('id_school');
        $career->save();

        \Alert::success("La carrera $career->name se actualizó correctamente");
        return redirect(route('admin.careers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $name = $career->name;
        $career->delete();
        \Alert::warning("La carrera $name se eliminó correctamente");
        return redirect(route('admin.careers.index'));
    }
}
