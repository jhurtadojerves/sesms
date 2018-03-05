<?php

namespace App\Http\Controllers;

use App\Staff;
use App\User;

use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function index()
    {
        $staff_members = Staff::with('user')->get();
        return view('admin.staff.index', compact('staff_members'));
    }

    public function create()
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        $type_values = [
            'coordinator' => 'Coordinador Académico',
            'director' => 'Director'
        ];

        return view('admin.staff.create', compact(['users', 'type_values']));
    }

    public function store(Request $request)
    {

        $staff = Staff::create(
            $request->all()
        );
        \Alert::success("El staff se registró correctamente");
        return redirect(route('admin.staff.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Staff $staff)
    {
        $users = User::all()->pluck('name', 'id')->toArray();
        $type_values = [
            'coordinator' => 'Coordinador Académico',
            'director' => 'Director'
        ];
        $staff->load('user');
        return view('admin.staff.edit', compact(['users', 'type_values', 'staff']));
    }

    public function update(Request $request, Staff $staff)
    {
        $staff->update($request->all());
        \Alert::success("El staff se actualizó correctamente");
        return redirect(route('admin.staff.index'));
    }

    public function destroy($id)
    {
        //
    }
}
