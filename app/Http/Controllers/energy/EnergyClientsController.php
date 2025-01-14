<?php

namespace App\Http\Controllers\energy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Energy\SolarClients;

class EnergyClientsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver Clientes', ['only' => ['index']]);
        $this->middleware('permission:Crear Clientes', ['only' => ['store','create']]);
        $this->middleware('permission:Editar Clientes', ['only' => ['update','edit']]);
        $this->middleware('permission:ELiminar Clientes', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=SolarClients::get();
        return view('energy.client.index', compact('id'));
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
        $request->validate([
            'name'=>['required'],
            'tel'=>['required'],
            'email'=>['required']
        ]);

        $request['locate']=$request->departament.', '.$request->municipio;

        SolarClients::create($request->all());

        return redirect()->route('energy_clients')->with('success','Se ha creado el cliente correctamente');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SolarClients $id)
    {
        $request->validate([
            'name'=>['required'],
            'tel'=>['required'],
            'email'=>['required']
        ]);
        $id->update($request->all());
        return redirect()->route('energy_clients')->with('success','Se ha actualizado el cliente correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolarClients $id)
    {
        $id->delete();
        return redirect()->route('energy_clients')->with('success','Se ha eliminado el cliente correctamente');
    }
}
