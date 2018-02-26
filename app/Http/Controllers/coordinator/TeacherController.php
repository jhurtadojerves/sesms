<?php

namespace App\Http\Controllers\coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User, Period, Syllable};

class TeacherController extends Controller
{
    public function index(Period $period)
    {
        $id_teachers = $period->upss()->pluck('id_user');
        $teachers = User::all()->whereIn('id', $id_teachers);
        return view('coordinator.teachers.index', compact(['teachers', 'period']));
    }

    public function syllables(Period $period, User $user)
    {
        $upss = $user->upss()->where('id_period', $period->id)->pluck('id');
        $syllables = Syllable::all()->whereIn('id_ups', $upss);
        return view('coordinator.syllables.index', compact(['syllables', 'period', 'user']));
    }
}
