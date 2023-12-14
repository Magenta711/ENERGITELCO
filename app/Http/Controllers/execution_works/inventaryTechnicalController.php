<?php

namespace App\Http\Controllers\execution_works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvUser;
use App\Models\project\Mintic\inventory\invMinticConsumable;
use App\Models\project\Mintic\inventory\invMinticEquipment;

class inventaryTechnicalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver inventario de técnicos|Editar inventario de técnicos|Lista de inventario de técnicos',['only'=>['index']]);
        $this->middleware('permission:Ver inventario de técnicos',['only'=>['show']]);
        $this->middleware('permission:Editar inventario de técnicos',['only'=>['edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = InvUser::get();
        return view('execution_works.inventory.technical.index',compact('inventories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventories = InvUser::where('user_id',$id)->get();
        return view('execution_works.inventory.technical.show',compact('inventories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventories = InvUser::where('user_id',$id)->get();
        return view('execution_works.inventory.technical.edit',compact('inventories','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach ($request->amount as $key => $value) {
            $inv = InvUser::find($key);
            if ($inv->stock != $value) {
                if ($inv->stock > $value) {
                    $inv->devolver(($inv->stock - $value));
                    
                    if ($inv->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticConsumable') {
                        invMinticConsumable::find($inv->inventaryble_id)->retroceso(($inv->stock - $value));
                    }
                    if ($inv->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticEquipment') {
                        invMinticEquipment::find($inv->inventaryble_id)->update([
                            'status' => 1
                        ]);
                    }
                }
                else {
                    $inv->entrar(($inv->stock - $value));
                    if ($inv->inventaryble_type == 'App\Models\project\Mintic\inventory\invMinticConsumable') {
                        invMinticConsumable::find($inv->inventaryble_id)->retroceso(($inv->stock - $value));
                    }
                }
            }
        }
        return redirect()->route('inventary_technical')->with('success','Se ha editado el inventario al usuario');
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
