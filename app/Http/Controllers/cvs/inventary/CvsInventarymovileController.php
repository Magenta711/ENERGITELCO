<?php

namespace App\Http\Controllers\cvs\inventary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\admin\cvs_sede;
use App\Models\cvs\inventory\cvs_inv_moviles;
use App\Models\cvs\inventory\cvs_inv_sim;

class CvsInventarymovileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de móviles|CVS Ver móviles|CVS Crear móviles|CVS Editar móviles',['only' => ['index']]);
        $this->middleware('permission:CVS Crear móviles',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar móviles',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver móviles',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moviles = cvs_inv_moviles::get();
        return view('cvs.inventory.moviles.index',compact('moviles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sedes = cvs_sede::where('status',1)->get();
        $sims = cvs_inv_sim::where('status',1)->get();
        return view('cvs.inventory.moviles.create',compact('sedes','sims'));
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
            'imei' => ['required','unique:cvs_inv_moviles,cod'],
            'brand' => ['required'],
            'family' => ['required'],
            'modelo' => ['required'],
            'value' => ['required','integer'],
            'postpaid_date' => ['required'],
            'icc_id' => ['required'],
            'sede_id' => ['required'],
        ]);
        $request['description'] = $request->modelo;
        $request['cod'] = $request->imei;
        $request['status'] = 1;
        $request['date'] = now();

        cvs_inv_moviles::create($request->all());

        return redirect()->route('cvs_inventary_moviles')->with('success','Se ha creado el movil correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_inv_moviles $id)
    {
        return view('cvs.inventory.moviles.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_inv_moviles $id)
    {
        $sedes = cvs_sede::get();
        return view('cvs.inventory.moviles.edit',compact('id','sedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_inv_moviles $id)
    {
        $request->validate([
            'imei' => ['required'],
            'brand' => ['required'],
            'family' => ['required'],
            'modelo' => ['required'],
            'value' => ['required','integer'],
            'postpaid_date' => ['required'],
            'icc_id' => ['required'],
            'sede_id' => ['required'],
        ]);
        $request['description'] = $request->modelo;
        $request['cod'] = $request->imei;

        $id->update($request->all());

        return redirect()->route('cvs_inventary_moviles')->with('success','Se ha actualizado el movil correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cvs_inv_moviles $id)
    {
        $id->delete();
        return redirect()->route('cvs_inventary_moviles')->with('success','Se ha eliminado el móvil '.$id->description.' correctamente');
    }
}
