<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Validator;

use App\Evaluation;
use App\Syllable;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{

    public function index()
    {
        //
    }


    public function create(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject', 'evaluations')->get();

        $activities_names = [
          'Exámenes' => 'Exámenes',
          'Pruebas' => 'Pruebas',
          'Investigación y Exposición' => 'Investigación y Exposición',
          'Tareas Individuales' => 'Tareas Individuales',
          'Talleres grupales' => 'Talleres grupales',
          'Práctica de Laboratorio' => 'Práctica de Laboratorio',
          'Participación en clase' => 'Participación en clase',
          'Actividades en el Aula Virtual' => 'Actividades en el Aula Virtual',
          'Proyecto' => 'Proyecto',
        ];

        \Alert::danger("No deje vacíos los campos, si no los utiliza llénelos con ceros");
        return view('syllable.evaluations.create', compact(['syllable', 'activities_names']));
    }

    public function store(Request $request, Syllable $syllable)
    {
        $request_all = $request->all();
        $request_all['id_syllable'] = $syllable->id;
        foreach ($request_all as &$item) {
            if (!$item)
                $item = 0;
        }
        $evaluations = $syllable->evaluations;
        $first = 0;
        $second = 0;
        $third = 0;
        $principal = 0;
        $recovery = 0;
        foreach ($evaluations as $evaluation) {
            $first += $evaluation->first;
            $second += $evaluation->second;
            $third += $evaluation->third;
            $principal += $evaluation->principal;
            $recovery += $evaluation->recovery;
        }

        $first_max = 8 - $first;
        $second_max = 10 - $second;
        $third_max = 10 - $third;
        $principal_max = 12 - $principal;
        $recovery_max = 20 - $recovery;
        $this->syllable = $syllable->id;
        $validator = Validator::make($request->all(), [
            'activity' => [
                'required',
                Rule::unique('evaluations', 'activity')->where(function ($query) {
                    $query->where('id_syllable', $this->syllable);
                }),
            ],
            'first' => "integer|max:$first_max",
            'second' => "integer|max:$second_max",
            'third' => "integer|max:$third_max",
            'principal' => "integer|max:$principal_max",
            'recovery' => "integer|max:$recovery_max",
        ])->validate();

        $evaluation = Evaluation::create($request_all);
        \Alert::success("La actividad $evaluation->activity se registró correctamente");
        return redirect(route('syllable.show', $syllable));
    }

    public function show(Evaluation $evaluation)
    {
        //
    }

    public function edit(Syllable $syllable, Evaluation $evaluation)
    {
        $syllable->load('ups', 'units', 'ups.subject', 'evaluations')->get();
        \Alert::danger("No deje vacíos los campos, si no los utiliza llénelos con ceros");
        return view('syllable.evaluations.edit', compact(['syllable', 'evaluation']));
    }

    public function update(Request $request, Syllable $syllable, Evaluation $evaluation)
    {
        $request_all = $request->all();
        foreach ($request_all as &$item) {
            if (!$item)
                $item = 0;
        }
        $evaluations = $syllable->evaluations;
        $first = 0;
        $second = 0;
        $third = 0;
        $principal = 0;
        $recovery = 0;
        foreach ($evaluations as $evaluation_item) {
            $first += $evaluation_item->first;
            $second += $evaluation_item->second;
            $third += $evaluation_item->third;
            $principal += $evaluation_item->principal;
            $recovery += $evaluation_item->recovery;
        }

        $first_max = 8 - $first - $evaluation->first;
        $second_max = 10 - $second - $evaluation->second;
        $third_max = 10 - $third - $evaluation->third;
        $principal_max = 12 - $principal - $evaluation->principal;
        $recovery_max = 20 - $recovery - $evaluation->recovery;

        $validator = Validator::make($request->all(), [
            'first' => "integer|max:$first_max",
            'second' => "integer|max:$second_max",
            'third' => "integer|max:$third_max",
            'principal' => "integer|max:$principal_max",
            'recovery' => "integer|max:$recovery_max",
        ])->validate();

        $evaluation->update($request->all());

        \Alert::success("La actividad $evaluation->activity se actualizó correctamente");
        $syllable->load('ups', 'units', 'ups.subject')->get();
        return redirect(route('syllable.show', $syllable));
    }

    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
