<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Location;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        // adding exception pressing in the controller
        // since it will be processed differently for user and console
        try {

            $location = new Location(['zip' => $request->get('zip')]);
            
            $request->user()->locations()->save($location);

        } catch (ClientException $e) {

            $bag = new MessageBag();
            $bag->add('error', 'Internal Error! Please try later.');

            return back()
                ->withErrors($bag)
                ->withInput();
        }

        return redirect('home');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
