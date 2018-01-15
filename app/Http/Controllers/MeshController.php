<?php

namespace App\Http\Controllers;

use App\Career;
use App\Mesh;
use App\Subject;
use Illuminate\Http\Request;

class MeshController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meshes = Mesh::orderBy('id')->get();
        return view('administracion.meshes.index', compact('meshes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = Career::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        return view('administracion.meshes.create', compact('careers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mesh = Mesh::create(
            $request->all()
        );

        \Alert::success('La Malla Curricular fue creada correctamente');
        return redirect(route('admin.meshes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesh  $mesh
     * @return \Illuminate\Http\Response
     */
    public function show(Mesh $mesh)
    {
        return view('administracion.meshes.show', compact('mesh'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesh  $mesh
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesh $mesh)
    {
        $careers = Career::orderBy('name', 'ASC')->pluck('name', 'id')->toArray();
        return view('administracion.meshes.edit', compact(['mesh', 'careers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesh  $mesh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesh $mesh)
    {
        $mesh->code = $request->get('code');
        $mesh->name = $request->get('name');
        $mesh->life = $request->get('life');
        $mesh->okay = $request->get('okay');
        $mesh->id_career = $request->get('id_career');
        $mesh->save();

        \Alert::success("La Malla Curricular se actualizó correctamente");
        return redirect(route('admin.meshes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesh  $mesh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesh $mesh)
    {
        $mesh->delete();
        \Alert::warning("La Malla Curricular se eliminó correctamente");
        return redirect(route('admin.meshes.index'));
    }
}
