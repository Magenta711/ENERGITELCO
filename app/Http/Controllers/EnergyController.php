<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnergyValues;
use App\Models\QuoteEnergy;

class EnergyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=EnergyValues::first();
        $Quote=QuoteEnergy::latest()->first()->get();   

        // return $Quote;
        return view('energy.admin.index',compact('id','Quote'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EnergyValues $id)
    {

        return view('energy.admin.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnergyValues $id)
    {
        $request->validate([
            'ModelPanel' => ['required'],
            'ValorPanel' => ['required'],
            'GarantiaPanel' => ['required'],
            'ModelRegulador' => ['required'],
            'ValorRegulador' => ['required'],
            'GarantiaRegulador' => ['required'],
            'ModelBateria' => ['required'],
            'ValorBateria' => ['required'],
            'GarantiaBateria' => ['required'],
            'ModelInversor' => ['required'],
            'ValorInversor' => ['required'],
            'GarantiaInversor' => ['required'],
        ]);

        $id->update($request->all());

        return redirect()->route('energy')->with('success','Se ha actualizado los valores de los equipos de cotización');

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
