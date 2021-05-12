<?php

namespace App\Http\Controllers\cvs\inventary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\inventory\cvs_inv_claro_service;

class CvsInventaryClaroServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de servicios Claro|CVS Ver servicios Claro|CVS Crear servicios Claro|CVS Editar servicios Claro',['only' => ['index']]);
        $this->middleware('permission:CVS Crear servicios Claro',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar servicios Claro',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver servicios Claro',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $claro_services = cvs_inv_claro_service::get();

        return view('cvs.inventory.claro_service.index',compact('claro_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvs.inventory.claro_service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['status'] = 1;
        cvs_inv_claro_service::create($request->all());
        return redirect()->route('cvs_inventary_claro_services')->with('success','Se ha creado el servicio correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_inv_claro_service $id)
    {
        return view('cvs.inventory.claro_service.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_inv_claro_service $id)
    {
        return view('cvs.inventory.claro_service.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cvs_inv_claro_service $id)
    {
        $id->update($request->all());
        return redirect()->route('cvs_inventary_claro_services')->with('success','Se ha actualizado el servicio correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cvs_inv_claro_service $id)
    {
        $id->delete();
        return redirect()->route('cvs_inventary_claro_services')->with('success','Se ha eliminado el servicio '.$id->description.' correctamente');
    }
}
