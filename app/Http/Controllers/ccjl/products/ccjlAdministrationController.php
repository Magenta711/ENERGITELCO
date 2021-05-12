<?php

namespace App\Http\Controllers\ccjl\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ccjl\ccjl_pro_administration;

class ccjlAdministrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');

        $this->middleware('permission:CCJL Lista de administraciones|CCJL Crear administraciones|CCJL Editar Administraciones|CCJL Ver administraciones',['only' => ['index']]);
        $this->middleware('permission:CCJL Crear administraciones',['only' => ['create','store']]);
        $this->middleware('permission:CCJL Editar Administraciones',['only' => ['edit','update']]);
        $this->middleware('permission:CCJL Ver administraciones',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administration = ccjl_pro_administration::get(); 
        return view('ccjl.products.administration.index',compact('administration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ccjl.products.administration.create');
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
            'value'=>['required'],
        ]);
        $request['status'] = 1;
        ccjl_pro_administration::create($request->all());
        return redirect()->route('CCJL_administrations')->with('success','Se ha creado la administración correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ccjl_pro_administration $id)
    {
        return view('ccjl.products.administration.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ccjl_pro_administration $id)
    {
        return view('ccjl.products.administration.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ccjl_pro_administration $id)
    {
        $id->update($request->all());

        return redirect()->route('CCJL_administrations')->with('success','Se ha editado la administración correctamente');
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
