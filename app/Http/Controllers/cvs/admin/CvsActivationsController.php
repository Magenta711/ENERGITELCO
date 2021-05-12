<?php

namespace App\Http\Controllers\cvs\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\cvs_activation_type;

class CvsActivationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de activaciones|CVS Ver activaciones|Crear activaciones|CVS Editar activaciones',['only' => ['index']]);
        $this->middleware('permission:CVS Crear activaciones',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar activaciones',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver activaciones',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activations = cvs_activation_type::get();
        return view('cvs.admin.activation.index',compact('activations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvs.admin.activation.create');
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
            'validate' => ['required']
        ]);
        cvs_activation_type::create($request->all());
        return redirect()->route('cvs_admin_activations')->with('success','Se ha creado una activación correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_activation_type $id)
    {
        return view('cvs.admin.activation.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_activation_type $id)
    {
        return view('cvs.admin.activation.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_activation_type $id)
    {
        $request->validate([
            'validate' => ['required']
        ]);
        $id->update($request->all());
        return redirect()->route('cvs_admin_activations')->with('success','Se ha actializado una activación correctamente');
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
