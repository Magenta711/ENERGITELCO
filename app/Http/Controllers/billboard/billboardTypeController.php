<?php

namespace App\Http\Controllers\billboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\billboard;
use App\Models\billboard\billboard_type;

class billboardTypeController extends Controller
{

    public function __construct() {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Lista de tipos de cartelera|Crear tipos de cartelera|Ver tipos de cartelera|Editar tipos de cartelera|Eliminar tipos de cartelera',['only' => ['index']]);
        $this->middleware('permission:Crear tipos de cartelera',['only' => ['create','store']]);
        $this->middleware('permission:Ver tipos de cartelera',['only' => ['show']]);
        $this->middleware('permission:Editar tipos de cartelera',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar tipos de cartelera',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_types = billboard_type::get();
        return view('billboard.type.index',compact('bill_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billboard.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['state'] = 1;
        billboard_type::create($request->all());
        return redirect()->route('billboard_type')->with('success','Se ha creado la cartelera correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(billboard_type $id)
    {
        return view('billboard.type.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(billboard_type $id)
    {
        return view('billboard.type.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,billboard_type $id)
    {
        $id->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(billboard_type $id)
    {
        foreach ($id->documents as $value) {
            billboard::where('id',$value->id)->update(['type_billboard'=>5]);
        }
        $id->delete();
        return redirect()->route('billboard_type')->with('success','Se ha eliminado la cartelera correctamente');
    }
}
