<?php

namespace App\Http\Controllers;

use App\Models\Refrigerators;
use App\Http\Requests\StoreRefrigeratorsRequest;
use App\Http\Requests\UpdateRefrigeratorsRequest;

class RefrigeratorsController extends Controller
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
     * @param  \App\Http\Requests\StoreRefrigeratorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRefrigeratorsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refrigerators  $refrigerators
     * @return \Illuminate\Http\Response
     */
    public function show(Refrigerators $refrigerators)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refrigerators  $refrigerators
     * @return \Illuminate\Http\Response
     */
    public function edit(Refrigerators $refrigerators)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRefrigeratorsRequest  $request
     * @param  \App\Models\Refrigerators  $refrigerators
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRefrigeratorsRequest $request, Refrigerators $refrigerators)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refrigerators  $refrigerators
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refrigerators $refrigerators)
    {
        //
    }
}
