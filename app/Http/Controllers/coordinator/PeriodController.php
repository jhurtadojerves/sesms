<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::orderBy('status')->get();
        return view('coordinator.periods.index', compact('periods'));
    }
}
