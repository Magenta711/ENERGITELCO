<?php

namespace App\Http\Controllers\cvs\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\admin\cvs_sede;

class CvsSedesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de sedes|CVS Ver sedes|Crear sedes|CVS Editar sedes',['only' => ['index']]);
        $this->middleware('permission:CVS Crear sedes',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar sedes',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver sedes',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes=cvs_sede::where('status',1)->get();
        return view('cvs.admin.sedes.index',compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvs.admin.sedes.create');
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
            'email' => ['required','email'],
            'address' => ['required'],
            'city' => ['required'],
            'tel' => ['required'],
        ]);
        $request['status'] = 1;
        cvs_sede::create($request->all());
        return redirect()->route('cvs_sedes')->with('success','Se ha creado una nueva sede correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_sede $id)
    {
        return view('cvs.admin.sedes.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_sede $id)
    {
        return view('cvs.admin.sedes.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cvs_sede $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'address' => ['required'],
            'city' => ['required'],
            'tel' => ['required'],
        ]);
        $id->update($request->all());
        return redirect()->route('cvs_sedes')->with('success','Se ha actualizado la sede correctamente');
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
