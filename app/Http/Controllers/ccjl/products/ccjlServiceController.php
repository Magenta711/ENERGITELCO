<?php

namespace App\Http\Controllers\ccjl\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ccjl\ccjl_pro_services;

class ccjlServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');

        $this->middleware('permission:CCJL Lista de servicios|CCJL Crear servicios|CCJL Editar servicios|CCJL Ver servicios',['only' => ['index']]);
        $this->middleware('permission:CCJL Crear servicios',['only' => ['create','store']]);
        $this->middleware('permission:CCJL Editar servicios',['only' => ['edit','update']]);
        $this->middleware('permission:CCJL Ver servicios',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = ccjl_pro_services::get();
        return view('ccjl.products.services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ccjl.products.services.create');
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
            'name' => ['required'],
            'value' => ['required'],
            'text' => ['required'],
        ]);

        $request['status'] = 1;
        ccjl_pro_services::create($request->all());
        
        return redirect()->route('CCJL_services')->with('success','Se ha creado el servicio correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ccjl_pro_services $id)
    {
        return view('ccjl.products.services.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ccjl_pro_services $id)
    {
        return view('ccjl.products.services.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ccjl_pro_services $id)
    {
        $id->update($request->all());

        return redirect()->route('CCJL_services')->with('success','Se ha editado el servicio correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ccjl_pro_services $id)
    {
        $id->update([ 'status' => 0 ]);
        return redirect()->route('CCJL_services')->with('success','Se ha eliminado el servicio correctamente');
    }
}
