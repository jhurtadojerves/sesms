<?php

namespace App\Http\Controllers;

use App\{ Bibliography, Syllable };
use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;

class BibliographyController extends Controller
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

    public function create(Syllable $syllable)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        $bibliography_types = [
            'basic' => 'Básica',
            'complementary' => 'Complementaria'
        ];
        $bibliography_format = [
            'apa' => 'Norma APA',
            'iso' => 'Norma ISO'
        ];
        return view('syllable.bibliographies.create', compact(['syllable', 'bibliography_types', 'bibliography_format']));
    }

    public function store(Request $request, Syllable $syllable)
    {
        $request_array = $request->all();
        $request_array['syllable_id'] = $syllable->id;

        $bibliography = Bibliography::create($request_array);

        \Alert::success("La referecia bliográfica se registró correctamente");
        return redirect(route('syllable.show', $syllable));

    }
    public function show(Bibliography $bibliography)
    {
        //
    }

    public function edit(Syllable $syllable, Bibliography $bibliography)
    {
        $syllable->load('ups', 'units', 'ups.subject')->get();
        $bibliography_types = [
            'basic' => 'Básica',
            'complementary' => 'Complementaria'
        ];
        $bibliography_format = [
            'apa' => 'Norma APA',
            'iso' => 'Norma ISO'
        ];
        return view('syllable.bibliographies.edit', compact(['syllable', 'bibliography', 'bibliography_types', 'bibliography_format']));
    }

    public function update(Request $request, Syllable $syllable, Bibliography $bibliography)
    {
        $bibliography->update($request->all());
        \Alert::success("La referecia bliográfica se actualizó correctamente");
        return redirect(route('syllable.show', $syllable));
    }

    public function destroy(Bibliography $bibliography)
    {
        //
    }
}
