<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('Main.Trainers' , compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainers
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainer  $trainers
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainers)
    {
        //
    }
}
