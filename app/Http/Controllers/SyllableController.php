<?php

namespace App\Http\Controllers;

use App\Syllable;
use App\Unit;
use App\Ups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SyllableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllables = Syllable::with('ups')->get();
        return view('syllable.index', compact('syllables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $upss = Ups::where('id_user', Auth::user()->id)
            ->where('id_period', 1)->with('subject')->get();

        return view('syllable.create', compact('upss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $syllable = new Syllable([
            'sede' => $request->get('sede'),
            'delivery' => $request->get('delivery'),
            'id_ups' => $request->get('id_ups'),
        ]);

        $syllable->save();
        \Alert::success('Sílabo agregado correctamente');
        return redirect(route('syllable.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Syllable  $syllable
     * @return \Illuminate\Http\Response
     */
    public function show(Syllable $syllable)
    {

        $syllable->load('ups', 'units', 'ups.subject')->get();
        return view('syllable.show', compact('syllable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllable  $syllable
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllable $syllable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllable  $syllable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllable $syllable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllable  $syllable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Syllable $syllable)
    {
        //
    }
}
