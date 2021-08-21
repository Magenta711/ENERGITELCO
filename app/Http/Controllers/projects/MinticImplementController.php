<?php

namespace App\Http\Controllers\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InvUser;
use App\Models\project\Mintic\inventory\invMinticConsumable;
use App\Models\project\Mintic\inventory\invMinticEquipment;
use App\Models\project\Mintic\MinticConsumableImplement;
use App\Models\project\Mintic\MinticConsumableImplementDetail;
use App\User;

class MinticImplementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Ver implementación proyectos de MINTIC|Crear asiganción de implemetación de MINTIC|Editar asiganción de implemetación de MINTIC|Ejecutar asiganción de implemetación de MINTIC|Ver asiganción de implemetación de MINTIC|Eliminar asiganción de implemetación de MINTIC',['only' => ['index']]);
        $this->middleware('permission:Crear asiganción de implemetación de MINTIC',['only' => ['create','store']]);
        $this->middleware('permission:Editar asiganción de implemetación de MINTIC',['only' => ['edit','update']]);
        $this->middleware('permission:Ejecutar asiganción de implemetación de MINTIC',['only' => ['run','save']]);
        $this->middleware('permission:Ver asiganción de implemetación de MINTIC',['only' => ['show']]);
        $this->middleware('permission:Eliminar asiganción de implemetación de MINTIC',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $implements = MinticConsumableImplement::where('project_id',$id)->get();
        return view('projects.mintic.add.index',compact('id','implements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $users = User::where('state',1)->get();
        $consumables = invMinticConsumable::where('status',1)->get();
        $equipments = invMinticEquipment::where('status',1)->get();
        
        return view('projects.mintic.add.create',compact('id','users','consumables','equipments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'user_id' => ['required'],
            'product' => ['required'],
        ]);
        $data = MinticConsumableImplement::create([
            'project_id' => $id,
            'user_id' => $request->user_id,
            'responsable_id' => auth()->id(),
            'status' => 3,
            'commentary' => $request->commentary
        ]);
        for ($i=0; $i < count($request->product); $i++) { 
            if ($request->product[$i] == 'consumable' && $request->description[$i]) {
                $data->details()->create([
                    'productable_id' => $request->description[$i],
                    'productable_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                    'amount' => $request->amount[$i],
                    'delivered' => 0,
                    'spent' => 0,
                    'margin' => 0,
                ]);
                $inv = InvUser::where('user_id',$request->user_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->description[$i])->first();
                if ($inv) {
                    $inv->entrar($request->amount[$i]);
                }else {
                    InvUser::create([
                        'user_id' => $request->user_id,
                        'inventaryble_id' => $request->description[$i],
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'tickets' => $request->amount[$i],
                        'departures' => 0,
                        'stock' => $request->amount[$i],
                    ]);
                }
                invMinticConsumable::find($request->description[$i])->gastar($request->amount[$i]);
            }
            if ($request->product[$i] == 'equipment' && $request->description[$i]) {
                $data->details()->create([
                    'productable_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                    'productable_id' => $request->description[$i],
                    'amount' => $request->amount[$i],
                    'delivered' => 0,
                    'spent' => 0,
                    'margin' => 0,
                ]);
                $inv = InvUser::where('user_id',$request->user_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$request->description[$i])->first();
                if ($inv) {
                    $inv->entrar(1);
                }else {
                    InvUser::create([
                        'user_id' => $request->user_id,
                        'inventaryble_id' => $request->description[$i],
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
                invMinticEquipment::find($request->description[$i])->update([
                    'status' => 2,
                ]);
            }
        }

        return redirect()->route('mintic_add_consumables',$id)->with('success','Se ha creado la implementación correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,MinticConsumableImplement $item)
    {
        return view('projects.mintic.add.show',compact('id','item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,MinticConsumableImplement $item)
    {
        $users = User::where('state',1)->get();
        $consumables = invMinticConsumable::get();
        $equipments = invMinticEquipment::get();
        return view('projects.mintic.add.edit',compact('id','item','users','consumables','equipments'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request,$id,MinticConsumableImplement $item)
    {
        $item->update([
            'commentary' => $request->commentary,
            'status' => $item->status == 2 ? 1 : ($item->status == 3 ? 3 : 1),
        ]);
        
        $i = 0;
        foreach ($item->details as $value) {
            if ($value->productable_type == 'App\Models\project\Mintic\inventory\invMinticConsumable') {
                invMinticConsumable::find($value->productable_id)->retroceso(($value->amount - $value->delivered));

                $inv = InvUser::where('user_id',$request->user_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->description[$i])->first()->devolver($request->amount[$i]);
            }
            if ($value->productable_type == 'App\Models\project\Mintic\inventory\invMinticEquipment') {
                invMinticEquipment::find($value->productable_id)->update([
                    'status' => 1,
                ]);
                $inv = InvUser::where('user_id',$request->user_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$request->description[$i])->first()->devolver(1);
            }
            MinticConsumableImplementDetail::find($value->id)->delete();
        }
        for ($i=0; $i < count($request->product); $i++) { 
            $deliverable = isset($request->delivered[$i]) ? $request->delivered[$i] : 0;
            $spent = isset($request->spent[$i]) ? $request->spent[$i] : 0;
            if ($request->product[$i] == 'consumable' && $request->description[$i]) {
                $item->details()->create([
                    'productable_id' => $request->description[$i],
                    'productable_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                    'amount' => $request->amount[$i],
                    'delivered' => $deliverable,
                    'spent' => $spent,
                    'margin' => 0,
                ]);
                $inv = InvUser::where('user_id',$request->user_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticConsumable')->where('inventaryble_id',$request->description[$i])->first();
                if ($inv) {
                    $inv->entrar($request->amount[$i]);
                }else {
                    InvUser::create([
                        'user_id' => $request->user_id,
                        'inventaryble_id' => $request->description[$i],
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticConsumable',
                        'tickets' => $request->amount[$i],
                        'departures' => 0,
                        'stock' => $request->amount[$i],
                    ]);
                }
                invMinticConsumable::find($request->description[$i])->gastar(($request->amount[$i] - $deliverable));
            }
            if ($request->product[$i] == 'equipment' && $request->description[$i]) {
                $status = $item->status == 3 ? 2  : 0;
                $item->details()->create([
                    'productable_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                    'productable_id' => $request->description[$i],
                    'amount' => $request->amount[$i],
                    'delivered' => $deliverable,
                    'spent' => $spent,
                    'margin' => 0,
                ]);
                invMinticEquipment::find($request->description[$i])->update([
                    'status' => $deliverable == 1 ? 1 : $status,
                ]);
                $inv = InvUser::where('user_id',$request->user_id)->where('inventaryble_type','App\Models\project\Mintic\inventory\invMinticEquipment')->where('inventaryble_id',$request->description[$i])->first();
                if ($inv) {
                    $inv->entrar(1);
                }else {
                    InvUser::create([
                        'user_id' => $request->user_id,
                        'inventaryble_id' => $request->description[$i],
                        'inventaryble_type' => 'App\Models\project\Mintic\inventory\invMinticEquipment',
                        'tickets' => 1,
                        'departures' => 0,
                        'stock' => 1
                    ]);
                }
            }
        }
        return redirect()->route('mintic_add_consumables',$id)->with('success','Se ha actualizado la implementación correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,MinticConsumableImplement $item)
    {
        $item->delete();
        return redirect()->route('mintic_add_consumables',$id)->with('success','Se ha eliminado la implementación correctamente');
    }

    public function run($id,MinticConsumableImplement $item)
    {
        return view('projects.mintic.add.run',compact('id','item'));
    }

    public function save(Request $request,$id,MinticConsumableImplement $item)
    {
        $item->update([
            'status' => 2,
        ]);
        $i = 0;
        foreach ($item->details as $detail) {
            MinticConsumableImplementDetail::find($detail->id)->update([
                'spent' => $request->spent[$i] ? $request->spent[$i] : 0,
            ]);
            if ($detail->productable_type == 'App\Models\project\Mintic\inventory\invMinticEquipment') {
                invMinticEquipment::find($detail->productable_id)->update([
                    'status' => 0,
                ]);
            }
            $i++;
        }
        
        return redirect()->route('mintic_add_consumables',$id)->with('success','Se ha guardado la implementación correctamente');
    }
}
