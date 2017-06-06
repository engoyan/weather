<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show weather locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = auth()->user()->locations()->get();

        return view('home', compact('locations'));
    }
}
