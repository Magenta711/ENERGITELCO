<?php

namespace App\Http\Controllers\cvs\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\inventory\cvs_inv_accesory_categories;

class CvsAccesoriesCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de categoría de accesorios|CVS Ver categoría de accesorios|Crear categoría de accesorios|CVS Editar categoría de accesorios',['only' => ['index']]);
        $this->middleware('permission:CVS Crear categoría de accesorios',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar categoría de accesorios',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver categoría de accesorios',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = cvs_inv_accesory_categories::get();
        return view('cvs.admin.accesory_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvs.admin.accesory_category.create');
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
            'validate' => ['required'],
        ]);
        cvs_inv_accesory_categories::create($request->all());
        return redirect()->route('cvs_admin_accesories_category')->with('success','Se ha creado la categoria de accesorios correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_inv_accesory_categories $id)
    {
        return view('cvs.admin.accesory_category.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_inv_accesory_categories $id)
    {
        return view('cvs.admin.accesory_category.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_inv_accesory_categories $id)
    {
        $request->validate([
            'validate' => ['required'],
        ]);
        $id->update($request->all());
        return redirect()->route('cvs_admin_accesories_category')->with('success','Se ha actualizado la categoria de accesorios correctamente');
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
