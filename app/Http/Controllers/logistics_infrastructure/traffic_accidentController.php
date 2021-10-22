<?php

namespace App\Http\Controllers\logistics_infrastructure;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\invVehicle;
use App\Models\trafficAccident;

class traffic_accidentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de caracterización de accidentes de tráncito|Crear caracterización de accidentes de tráncito|Editar caracterización de accidentes de tráncito|Ver caracterización de accidentes de tráncito|Eliminar caracterización de accidentes de tráncito',['only' => ['index']]);
        $this->middleware('permission:Crear caracterización de accidentes de tráncito',['only' => ['create','store']]);
        $this->middleware('permission:Editar caracterización de accidentes de tráncito',['only' => ['update','edit']]);
        $this->middleware('permission:Ver caracterización de accidentes de tráncito',['only' => ['show']]);
        $this->middleware('permission:Eliminar caracterización de accidentes de tráncito',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traffic_accidents = trafficAccident::get();
        return view('logistics_infrastructure.traffic_accident.index',compact('traffic_accidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = invVehicle::get();
        return view('logistics_infrastructure.traffic_accident.create',compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['responsable_id'] = auth()->id();
        trafficAccident::create($request->all());
        return redirect()->route('traffic_accident')->with('success','Se ha registrado el accidente correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(trafficAccident $id)
    {
        return view('logistics_infrastructure.traffic_accident.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(trafficAccident $id)
    {
        $vehicles = invVehicle::get();
        return view('logistics_infrastructure.traffic_accident.edit',compact('vehicles','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,trafficAccident $id)
    {
        $id->update($request->all());
        return redirect()->route('traffic_accident')->with('success','Se ha actualizado el accidente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(trafficAccident $id)
    {
        $id->delete();
        return redirect()->route('traffic_accident')->with('success','Se ha eliminado el accidente correctamente');
    }
}
