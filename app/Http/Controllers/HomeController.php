<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin.home');
    }

    public function home()
    {
        return redirect(route('home'));
    }
}
