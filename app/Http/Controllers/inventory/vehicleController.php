<?php

namespace App\Http\Controllers\inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\invVehicle;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class vehicleController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de vehículos del inventario|Crear vehículos al inventario|Ver vehículos del inventario|Editar vehículos del inventario|Eliminar vehículos del inventario',['only' => ['index']]);
        $this->middleware('permission:Crear vehículos al inventario',['only' => ['create','store']]);
        $this->middleware('permission:Ver vehículos del inventario',['only' => ['show']]);
        $this->middleware('permission:Editar vehículos del inventario',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar vehículos del inventario',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = invVehicle::where('status','!=',0)->get();
        return view('inventory.vehicles.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'brand' => ['required'],
            'plate' => ['required'],
            'line' => ['required'],
            'color' => ['required'],
            'model' => ['required'],
            'start_date' => ['required','date'],
            'exp_date' => ['required','date'],
            'type' => ['required'],
            'body_type' => ['required'],
            'soats' => ['required'],
            'soat_date' => ['required','date'],
            'num_enrollment' => ['required'],
            'enrollments' => ['required'],
            'fuel' => ['required'],
            'capacity' => ['required'],
            'technomechanicals' => ['required'],
            'technomechanical_date' => ['required','date'],
            'toll_ship' => ['required'],
            'tires' => ['required'],
            'spare_tire' => ['required'],
            'cc' => ['required'],
        ]);
        if ($request->hasFile('avatars')) {
            $file = $request->file('avatars');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['avatar'] = $name;
        }
        if ($request->hasFile('enrollments')) {
            $file = $request->file('enrollments');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['enrollment'] = $name;
        }
        if ($request->hasFile('soats')) {
            $file = $request->file('soats');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['soat'] = $name;
        }
        if ($request->hasFile('gasess')) {
            $file = $request->file('gasess');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['gases'] = $name;
        }
        if ($request->hasFile('technomechanicals')) {
            $file = $request->file('technomechanicals');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['technomechanical'] = $name;
        }
        if ($request->hasFile('first_aid_kits')) {
            $file = $request->file('first_aid_kits');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['first_aid_kit'] = $name;
        }
        $request['status'] = 1;
        $vehicle = invVehicle::create($request->all());
        //Files
        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de vehículos del inventario')) {
                $user->notify(new notificationMain($vehicle->id,'Nuevo vehículo registrado '.$vehicle->id,'invetory/vehicle/show/'));
            }
        }
        return redirect()->route('inv_vehicle')->with('success','Se ha creado el vehículo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(invVehicle $id)
    {
        return view('inventory.vehicles.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(invVehicle $id)
    {
        return view('inventory.vehicles.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invVehicle $id)
    {
        $request->validate([
            'brand' => ['required'],
            'plate' => ['required'],
            'line' => ['required'],
            'color' => ['required'],
            'model' => ['required'],
            'start_date' => ['required','date'],
            'exp_date' => ['required','date'],
            'type' => ['required'],
            'body_type' => ['required'],
            'soat_date' => ['required','date'],
            'num_enrollment' => ['required'],
            'fuel' => ['required'],
            'capacity' => ['required'],
            'technomechanical_date' => ['required','date'],
            'toll_ship' => ['required'],
            'tires' => ['required'],
            'spare_tire' => ['required'],
            'cc' => ['required'],
        ]);
        //Validate
        if ($request->hasFile('avatars')) {
            $file = $request->file('avatars');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['avatar'] = $name;
        }else {
            $request['avatar'] = $id->avatar;
        }
        if ($request->hasFile('enrollments')) {
            $file = $request->file('enrollments');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['enrollment'] = $name;
        }else {
            $request['enrollment'] = $id->enrollment;
        }
        if ($request->hasFile('soats')) {
            $file = $request->file('soats');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['soat'] = $name;
        }else {
            $request['soat'] = $id->soat;
        }
        if ($request->hasFile('gasess')) {
            $file = $request->file('gasess');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['gases'] = $name;
        }else {
            $request['gases'] = $id->gases;
        }
        if ($request->hasFile('technomechanicals')) {
            $file = $request->file('technomechanicals');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['technomechanical'] = $name;
        }else {
            $request['technomechanical'] = $id->technomechanical;
        }
        if ($request->hasFile('first_aid_kits')) {
            $file = $request->file('first_aid_kits');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['first_aid_kit'] = $name;
        }else {
            $request['first_aid_kit'] = $id->first_aid_kit;
        }
        $id->update($request->all());
        //Files
        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de vehículos del inventario')) {
                $user->notify(new notificationMain($id->id,'Un vehículo del inventario fue editado '.$id->id,'invetory/vehicle/show/'));
            }
        }
        
        return redirect()->route('inv_vehicle')->with('success','Se ha actualizado el vehículo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(invVehicle $id)
    {
        $id->update(['status'=>0]);
        return redirect()->route('inv_vehicle')->with('success','Se ha eliminado el vehículo correctamente');
    }
}