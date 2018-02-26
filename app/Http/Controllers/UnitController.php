<?php

namespace App\Http\Controllers;

use App\Syllable;
use App\Unit;
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;

class UnitController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.units.create', compact('syllable'));
    }

    public function store(Request $request, Syllable $syllable)
    {
        $unit = new Unit();
        $unit->name = $request->get('name');
        $unit->objetive = $request->get('objetive');

        $converter = new HtmlConverter(array('strip_tags' => true));

        $unit->achievement = $converter->convert($request->get('achievement'));
        $unit->methodological_strategy = $converter->convert($request->get('methodological_strategy'));
        $unit->resources = $converter->convert($request->get('resources'));
        $unit->classroom_activities = $converter->convert($request->get('classroom_activities'));
        $unit->autonomous_activities = $converter->convert($request->get('autonomous_activities'));
        $unit->id_syllable = $syllable->id;

        $last_unit = $syllable->units()->orderBy('created_at', 'desc')->first();
        $unit->number = $last_unit ? $last_unit->number+1 : 1;

        $unit->save();
        \Alert::success("La unidad $unit->name se agregó correctamente");
        return redirect(route('syllable.show', $syllable));

    }

    public function show(Syllable $syllable, Unit $unit)
    {
        $unit->load(['topics', 'syllable', 'syllable.ups', 'syllable.ups.subject']);

        return view('syllable.units.show', compact(['unit', 'syllable']));
    }

    public function edit(Syllable $syllable, Unit $unit)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.units.edit', compact(['syllable', 'unit']));
    }

    public function update(Request $request, Syllable $syllable, Unit $unit)
    {
        $unit->name = $request->get('name');
        $unit->objetive = $request->get('objetive');
        $converter = new HtmlConverter(array('strip_tags' => true));

        $unit->achievement = $converter->convert($request->get('achievement'));
        $unit->methodological_strategy = $converter->convert($request->get('methodological_strategy'));
        $unit->resources = $converter->convert($request->get('resources'));
        $unit->classroom_activities = $converter->convert($request->get('classroom_activities'));
        $unit->autonomous_activities = $converter->convert($request->get('autonomous_activities'));

        $unit->save();

        \Alert::success("La unidad $unit->name se actualizó correctamente");
        return redirect(route('syllable.unit.show', compact(['syllable', 'unit'])));

    }

    public function destroy(Syllable $syllable, Unit $unit)
    {
        $unit_name = $unit->name;
        $unit->delete();
        $syllable->load('ups', 'units', 'ups.subject')->get();
        \Alert::success("La unidad $unit_name se eliminó correctamente");
        return view('syllable.show', compact('syllable'));
    }
}
