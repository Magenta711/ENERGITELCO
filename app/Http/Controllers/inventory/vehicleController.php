<?php

namespace App\Http\Controllers\inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\invVehicle;
use App\Models\invVehicleMtt;
use App\Models\invVehicleReport;
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
        if ($request->hasFile('liability_insurances')) {
            $file = $request->file('liability_insurances');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['liability_insurance'] = $name;
        }
        if ($request->hasFile('policys')) {
            $file = $request->file('policys');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['policy'] = $name;
        }

        $request['status'] = 1;
        $vehicle = invVehicle::create($request->all());
        $this->addNewDetail($vehicle->id,$request->last_ch_oil,$request->last_ws_oil,$request->last_val_oil,'oil');
        $this->addNewDetail($vehicle->id,$request->last_ch_tires,$request->last_ws_tires,$request->last_val_tires,'tires');
        $this->addNewDetail($vehicle->id,$request->last_ch_lubrication,$request->last_ws_lubrication,$request->last_val_lubrication,'lubrication');
        $this->addNewDetail($vehicle->id,$request->last_ch_address,$request->last_ws_address,$request->last_val_address,'address');
        $this->addNewDetail($vehicle->id,$request->last_ch_motor,$request->last_ws_motor,$request->last_val_motor,'motor');
        $this->addNewDetail($vehicle->id,$request->last_ch_clutch,$request->last_ws_clutch,$request->last_val_clutch,'clutch');
        $this->addNewDetail($vehicle->id,$request->last_ch_suspension,$request->last_ws_suspension,$request->last_val_suspension,'suspension');
        $this->addNewDetail($vehicle->id,$request->last_ch_brakes_bands,$request->last_ws_brakes_bands,$request->last_val_brakes_bands,'brakes_bands');
        $this->addNewDetail($vehicle->id,$request->last_ch_brakes_pastes,$request->last_ws_brakes_pastes,$request->last_val_brakes_pastes,'brakes_pastes');
        $this->addNewDetail($vehicle->id,$request->last_ch_brake_pump,$request->last_ws_brake_pump,$request->last_val_brake_pump,'brake_pump');
        $this->addNewDetail($vehicle->id,$request->last_ch_box_transmission,$request->last_ws_box_transmission,$request->last_val_box_transmission,'box_transmission');
        $this->addNewDetail($vehicle->id,$request->last_ch_brassiness,$request->last_ws_brassiness,$request->last_val_brassiness,'brassiness');
        $this->addNewDetail($vehicle->id,$request->last_ch_lights,$request->last_ws_lights,$request->last_val_lights,'lights');
        $this->addNewDetail($vehicle->id,$request->last_ch_gases,$request->last_ws_gases,$request->last_val_gases,'gases');
        $this->addNewDetail($vehicle->id,$request->last_ch_wistle,$request->last_ws_wistle,$request->last_val_wistle,'wistle');
        $this->addNewDetail($vehicle->id,$request->last_ch_timing_belt,$request->last_ws_timing_belt,$request->last_val_timing_belt,'timing_belt');
        $this->addNewDetail($vehicle->id,$request->last_ch_alignment_balancing,$request->last_ws_alignment_balancing,$request->last_val_alignment_balancing,'alignment_balancing');
        $this->addNewDetail($vehicle->id,$request->last_ch_batteries,$request->last_ws_batteries,$request->last_val_batteries,'batteries');
        
        $this->addNewReport($vehicle->id,$request->date_summons_report,$request->place_summons_report,$request->area_summons_report,'summons');
        $this->addNewReport($vehicle->id,$request->date_incident_report,$request->place_incident_report,$request->area_incident_report,'incident');
        $this->addNewReport($vehicle->id,$request->date_accident_report,$request->place_accident_report,$request->area_accident_report,'accident');



        
        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de vehículos del inventario')) {
                $user->notify(new notificationMain($vehicle->id,'Nuevo vehículo registrado '.$vehicle->id,'logistics_infrastructure/invetory/vehicle/show/'));
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
        if ($request->hasFile('liability_insurances')) {
            $file = $request->file('liability_insurances');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['liability_insurance'] = $name;
        }else {
            $request['liability_insurance'] = $id->liability_insurance;
        }

        if ($request->hasFile('policys')) {
            $file = $request->file('policys');
            $str = Str::random(5);
            $name = time().$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/inventory/vehicle', $file, $name);
            $request['policy'] = $name;
        }

        $id->update($request->all());

        invVehicleMtt::where('vehicle_id',$id->id)->delete();
        
        $this->addNewDetail($id->id,$request->last_ch_oil,$request->last_ws_oil,$request->last_val_oil,'oil');
        $this->addNewDetail($id->id,$request->last_ch_tires,$request->last_ws_tires,$request->last_val_tires,'tires');
        $this->addNewDetail($id->id,$request->last_ch_lubrication,$request->last_ws_lubrication,$request->last_val_lubrication,'lubrication');
        $this->addNewDetail($id->id,$request->last_ch_address,$request->last_ws_address,$request->last_val_address,'address');
        $this->addNewDetail($id->id,$request->last_ch_motor,$request->last_ws_motor,$request->last_val_motor,'motor');
        $this->addNewDetail($id->id,$request->last_ch_clutch,$request->last_ws_clutch,$request->last_val_clutch,'clutch');
        $this->addNewDetail($id->id,$request->last_ch_suspension,$request->last_ws_suspension,$request->last_val_suspension,'suspension');
        $this->addNewDetail($id->id,$request->last_ch_brakes_bands,$request->last_ws_brakes_bands,$request->last_val_brakes_bands,'brakes_bands');
        $this->addNewDetail($id->id,$request->last_ch_brakes_pastes,$request->last_ws_brakes_pastes,$request->last_val_brakes_pastes,'brakes_pastes');
        $this->addNewDetail($id->id,$request->last_ch_brake_pump,$request->last_ws_brake_pump,$request->last_val_brake_pump,'brake_pump');
        $this->addNewDetail($id->id,$request->last_ch_box_transmission,$request->last_ws_box_transmission,$request->last_val_box_transmission,'box_transmission');
        $this->addNewDetail($id->id,$request->last_ch_brassiness,$request->last_ws_brassiness,$request->last_val_brassiness,'brassiness');
        $this->addNewDetail($id->id,$request->last_ch_lights,$request->last_ws_lights,$request->last_val_lights,'lights');
        $this->addNewDetail($id->id,$request->last_ch_gases,$request->last_ws_gases,$request->last_val_gases,'gases');
        $this->addNewDetail($id->id,$request->last_ch_wistle,$request->last_ws_wistle,$request->last_val_wistle,'wistle');
        $this->addNewDetail($id->id,$request->last_ch_timing_belt,$request->last_ws_timing_belt,$request->last_val_timing_belt,'timing_belt');
        $this->addNewDetail($id->id,$request->last_ch_alignment_balancing,$request->last_ws_alignment_balancing,$request->last_val_alignment_balancing,'alignment_balancing');
        $this->addNewDetail($id->id,$request->last_ch_batteries,$request->last_ws_batteries,$request->last_val_batteries,'batteries');

        invVehicleReport::where('vehicle_id',$id->id)->delete();
        
        $this->addNewReport($id->id,$request->date_summons_report,$request->place_summons_report,$request->area_summons_report,'summons');
        $this->addNewReport($id->id,$request->date_incident_report,$request->place_incident_report,$request->area_incident_report,'incident');
        $this->addNewReport($id->id,$request->date_accident_report,$request->place_accident_report,$request->area_accident_report,'accident');

        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de vehículos del inventario')) {
                $user->notify(new notificationMain($id->id,'Un vehículo del inventario fue editado '.$id->id,'logistics_infrastructure/invetory/vehicle/show/'));
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
    public function addNewDetail($id,$last_ch,$last_ws,$last_val,$type)
    {
        $acc_last_ch = count($last_ch);
        $acc_last_ws = count($last_ws);
        $acc_last_val = count($last_val);
        
        if ($acc_last_ch > $acc_last_ws) {
            if ($acc_last_ch > $acc_last_val) {
                $mayor = $acc_last_ch;
            }
        }else {
            if ($acc_last_ws > $acc_last_val){
                $mayor = $acc_last_ws;
            }else {
                $mayor = $acc_last_val;
            }
        }

        for ($i=0; $i < $mayor; $i++) { 
            if ($last_ch[$i] != '' || $last_ws[$i] != '' || $last_val[$i]) {
                invVehicleMtt::create([
                    'vehicle_id' => $id,
                    'last_ch' => $last_ch[$i],
                    'last_ws' => $last_ws[$i],
                    'last_val' => $last_val[$i],
                    'type' => $type
                ]);
            }
        }
    }

    public function addNewReport($id,$date,$place,$area,$type)
    {
        $acc_date = count($date);
        $acc_place = count($place);
        $acc_area = count($area);
        
        if ($acc_date > $acc_place) {
            if ($acc_date > $acc_area) {
                $mayor = $acc_date;
            }
        }else {
            if ($acc_place > $acc_area){
                $mayor = $acc_place;
            }else {
                $mayor = $acc_area;
            }
        }

        for ($i=0; $i < $mayor; $i++) { 
            if ($date[$i] != '' || $place[$i] != '' || $area[$i]) {
                invVehicleReport::create([
                    'vehicle_id' => $id,
                    'date' => $date[$i],
                    'place' => $place[$i],
                    'area' => $area[$i],
                    'type' => $type
                ]);
            }
        }
    }
}