<?php

namespace App\Http\Controllers\projects\inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\project\Mintic\inventory\invMinticConsumable;

class ConsumablesController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Lista de inventarios de consumibles en bodega|Crear consumible del inventario|Ver consumible del inventario|Editar consumible del inventario|Eliminar consumible del inventario',['only' => ['index']]);
        $this->middleware('permission:Crear consumible del inventario',['only' => ['create','store']]);
        $this->middleware('permission:Ver consumible del inventario',['only' => ['show']]);
        $this->middleware('permission:Editar consumible del inventario',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar consumible del inventario',['only' => ['destroy']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumables = invMinticConsumable::get();
        return view('projects.inventory.consumables.index',compact('consumables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.inventory.consumables.create');
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
            'item' => ['required'],
            'amount' => ['required'],
        ]);
        $request['status'] = 1;
        invMinticConsumable::create($request->all());
        return redirect()->route('mintic_inventory_consumables')->with('success','Se ha creado el consumible correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(invMinticConsumable $id)
    {
        return view('projects.inventory.consumables.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(invMinticConsumable $id)
    {
        return view('projects.inventory.consumables.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,invMinticConsumable $id)
    {
        $request->validate([
            'item' => ['required'],
            'amount' => ['required'],
        ]);
        if ($id->status == 0) {
            $request['status'] = $request->amount > 0 ? 1 : 0;
        }
        $id->update($request->all());
        return redirect()->route('mintic_inventory_consumables')->with('success','Se ha creado el consumible correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(invMinticConsumable $id)
    {
        if (count($id->productables) == 0) {
            $id->delete();
            return redirect()->route('mintic_inventory_consumables')->with('success','Se ha eliminado el consumible correctamente');
        }else {
            return redirect()->route('mintic_inventory_consumables')->with('success','No se ha eliminado el consumible devido a su relación con un proyecto');
        }
    }
}
