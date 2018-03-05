<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::whereType('teacher')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->get('password'));
        $user->save();
        \Alert::success("El docente $user->name se registró correctamente");
        return redirect(route('admin.teachers.index'));
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $type_values = [
            'teacher' => 'Docente',
            'coordinator' => 'Coordinador Académico',
            'admin' => 'Administrador'
        ];
        return view('admin.teachers.edit', compact(['user', 'type_values']));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        \Alert::success("El docente $user->name se actualizó correctamente");
        return redirect(route('admin.teachers.index'));
    }

    public function destroy(User $user)
    {
        //
    }
}
