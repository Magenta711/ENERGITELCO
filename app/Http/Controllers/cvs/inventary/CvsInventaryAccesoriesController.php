<?php

namespace App\Http\Controllers\cvs\inventary;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\admin\cvs_sede;
use App\Models\cvs\inventory\cvs_inv_accesory;
use App\Models\cvs\inventory\cvs_inv_accesory_categories;

class CvsInventaryAccesoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de accesorios|CVS Ver accesorios|CVS Crear accesorios|CVS Editar accesorios',['only' => ['index']]);
        $this->middleware('permission:CVS Crear accesorios',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar accesorios',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver accesorios',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesories = cvs_inv_accesory::get();
        return view('cvs.inventory.accesories.index',compact('accesories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = cvs_inv_accesory_categories::get();
        $sedes = cvs_sede::get();
        return view('cvs.inventory.accesories.create',compact('categories','sedes'));
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
            'cod' => ['required'],
            'brand' => ['required'],
            'category_id' => ['required'],
            'reference' => ['required'],
            'value' => ['required'],
            'amount' => ['required'],
            'sede_id' => ['required'],
        ]);

        $request['description'] = $request->reference;
        $request['status'] = 1;

        cvs_inv_accesory::create($request->all());

        return redirect()->route('cvs_inventary_Accesories')->with('success','Se ha creado el accesorio correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_inv_accesory $id)
    {
        return view('cvs.inventory.accesories.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_inv_accesory $id)
    {
        $categories = cvs_inv_accesory_categories::get();
        $sedes = cvs_sede::get();
        return view('cvs.inventory.accesories.edit',compact('id','categories','sedes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_inv_accesory $id)
    {
        $request->validate([
            'cod' => ['required'],
            'brand' => ['required'],
            'category_id' => ['required'],
            'reference' => ['required'],
            'value' => ['required'],
            'amount' => ['required'],
            'sede_id' => ['required'],
        ]);

        $request['description'] = $request->reference;

        $id->update($request->all());

        return redirect()->route('cvs_inventary_Accesories')->with('success','Se ha actualizado el accesorio correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cvs_inv_accesory $id)
    {
        $id->delete();
        return redirect()->route('cvs_inventary_Accesories')->with('success','Se ha eliminado la sim card '.$id->description.' correctamente');
    }
}
