<?php

namespace App\Http\Controllers;

use App\Models\Prices;
use App\Http\Requests\StorePricesRequest;
use App\Http\Requests\UpdatePricesRequest;

class PricesController extends Controller
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
     * @param  \App\Http\Requests\StorePricesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePricesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function show(Prices $prices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function edit(Prices $prices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePricesRequest  $request
     * @param  \App\Models\Prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePricesRequest $request, Prices $prices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prices  $prices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prices $prices)
    {
        //
    }
}
