<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::orderBy('status')->get();
        return view('admin.periods.index', compact('periods'));
    }

    public function create()
    {
        return view('admin.periods.create');
    }

    public function store(Request $request)
    {
        $school = Period::create(
            $request->all()
        );
        $school->status = $request->has('status');
        $school->save();
        \Alert::success('El periodo académico fue creado correctamente');
        return redirect(route('admin.periods.index'));

    }

    public function show(Period $period)
    {
        //
    }

    public function edit(Period $period)
    {
        return view('admin.periods.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $period->name = $request->get('name');
        $period->star = $request->get('star');
        $period->end = $request->get('end');
        $period->status = $request->has('status');
        $period->save();

        \Alert::success('El periodo académico se actualizó correctamente');
        return redirect(route('admin.periods.index'));
    }

    public function destroy(Period $period)
    {
        $period->delete();
        \Alert::warning('El periodo académico se eliminó correctamente');
        return redirect(route('admin.periods.index'));
    }
}
