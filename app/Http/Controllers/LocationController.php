<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Location;


class LocationController extends Controller
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
     * Show the form for creating a new location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created location in storage.
     *
     * @param  \Illuminate\Http\LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {

        $location = new Location(['zip' => $request->get('zip')]);
        $request->user()->locations()->save($location);

        return redirect('home');
    }
}
