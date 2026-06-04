<?php

namespace App\Http\Controllers\projects\inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvUser;
use App\Models\project\Mintic\inventory\EquimentDetail;
use App\Models\project\Mintic\inventory\invMinticEquipment;
use App\Models\project\Mintic\Mintic_School;
use App\Models\project\Mintic\MinticConsumableImplement;
use App\Models\project\Mintic\MinticConsumableImplementDetail;
use App\User;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Lista de inventarios de equipos Mintic|Crear equipo al inventario Mintic|Ver equipo al inventario Mintic|Editar equipo al inventario Mintic|Eliminar equipo al inventario Mintic',['only' => ['index']]);
        $this->middleware('permission:Crear equipo al inventario Mintic',['only' => ['create','store']]);
        $this->middleware('permission:Ver equipo al inventario Mintic',['only' => ['show']]);
        $this->middleware('permission:Editar equipo al inventario Mintic',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar equipo al inventario Mintic',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = invMinticEquipment::get();
        return view('projects.inventory.equipment.index',compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipment_deatils = EquimentDetail::get();
        return view('projects.inventory.equipment.create',compact('equipment_deatils'));
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
            'serial' => ['required'],
            'item' => ['required'],
            'brand' => ['required']
        ]);
        if ($request->equip_id != 0) {
            $equip = EquimentDetail::find($request->equip_id);
            $equip->update([
                'tickets' => $equip->tickets + 1,
                'stock' => $equip->stock + 1,
            ]);
            $request['item'] = $equip->name;
            $request['brand'] = $equip->brand;
        }else {
            $request['equip_id'] = null;
        }
        
        $request['status'] = 1;
        invMinticEquipment::create($request->all());
        return redirect()->route('mintic_inventory_equipment')->with('success','Se ha creado el equipo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(invMinticEquipment $id)
    {
        return view('projects.inventory.equipment.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(invMinticEquipment $id)
    {
        $equipment_deatils = EquimentDetail::get();
        $projects = Mintic_School::get();
        $users = User::where('state',1)->get();
        return view('projects.inventory.equipment.edit',compact('id','equipment_deatils','projects','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,invMinticEquipment $id)
    {
        $request->validate([
            'serial' => ['required'],
            'item' => ['required'],
            'brand' => ['required'],
        ]);
        // if ($request->status == 3) {
            if ($request->proyect_id && $request->tehcnical_id) {
                $imple = MinticConsumableImplement::where('project_id',$request->proyect_id)->where('user_id',$request->tehcnical_id)->first();
                if ($imple) {
                    
                }else {
                    $imple = MinticConsumableImplement::create([
                        'project_id' => $request->proyect_id,
                        'user_id' => $request->tehcnical_id,
                        'responsable_id' => auth()->id(),
                        'status' => 3,
                        'commentary' => 'Auto'
                    ]);
                }
                MinticConsumableImplementDetail::create([
                    'productable_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                    'productable_id' => $id->id,
                    'implement_id' => $imple->id,
                    'amount' => 1,
                    'delivered' => 0,
                    'spent' => 0,
                    'margin' => 0,
                ]);
            }else if (!$request->proyect_id && $request->tehcnical_id) {
                $inv = InvUser::where('user_id',$request->tehcnical_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$id->id)->first();
                if ($inv) {
                    $inv->entrar(1);
                }else {
                    InvUser::create([
                        'user_id' => $request->tehcnical_id,
                        'inventaryble_id' => $id->id,
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
            }
        // }
        $id->update($request->all());
        return redirect()->route('mintic_inventory_equipment')->with('success','Se ha actualizado el equipo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(invMinticEquipment $id)
    {
        $id->delete();

        return redirect()->route('mintic_inventory_equipment')->with('success','Se ha eliminado el equipo correctamente');
    }
}
