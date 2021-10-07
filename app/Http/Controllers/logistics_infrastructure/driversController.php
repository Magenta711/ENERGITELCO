<?php

namespace App\Http\Controllers\logistics_infrastructure;

use App\Drivers;
use App\DriversAccident;
use App\DriversControl;
use App\DriversExam;
use App\DriversReport;
use App\DriversTest;
use App\DriversTraining;
use App\Exports\DriverDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\invVehicle;
use App\User;

class driversController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Drivers::get();
        return view('logistics_infrastructure.drivers.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        $vehicles = invVehicle::where('status','!=',0)->get();
        return view('logistics_infrastructure.drivers.create',compact('users','vehicles'));
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
            'user_id' => ['required','unique:drivers,user_id']
        ]);
        $request['responsable_id'] = auth()->id();
        $driver = Drivers::create($request->all());
        
        foreach ($request->report_date as $key => $value) {
            if ($value != '') {
                DriversReport::create([
                    'date' => $value,
                    'city' => $request->report_city[$key],
                    'suject' => $request->report_suject[$key],
                    'observation' => $request->report_observation[$key],
                    'driver_id' => $driver->id
                ]);
            }
        }
        foreach ($request->control_date as $key => $value) {
            if ($value != '') {
                DriversControl::create([
                    'date' => $value,
                    'city' => $request->control_city[$key],
                    'suject' => $request->control_suject[$key],
                    'observation' => $request->control_observation[$key],
                    'driver_id' => $driver->id
                ]);
            }
        }
        foreach ($request->accident_date as $key => $value) {
            if ($value != '') {
                DriversAccident::create([
                    'date' => $value,
                    'city' => $request->accident_city[$key],
                    'vehicle_id' => $request->accident_vehicle[$key],
                    'zone' => $request->accident_zone[$key],
                    'details' => $request->accident_details[$key],
                    'driver_id' => $driver->id
                ]);
            }
        }
        foreach ($request->exam_date as $key => $value) {
            if ($value != '') {
                DriversExam::create([
                    'date' => $value,
                    'type' => $request->exam_type[$key],
                    'result' => $request->exam_result[$key],
                    'commentary' => $request->exam_commentary[$key],
                    'driver_id' => $driver->id
                ]);
            }
        }
        foreach ($request->test_date as $key => $value) {
            if ($value != '') {
                DriversTest::create([
                    'date' => $value,
                    'type' => $request->test_type[$key],
                    'result' => $request->test_result[$key],
                    'commentary' => $request->test_commentary[$key],
                    'driver_id' => $driver->id
                ]);
            }
        }
        foreach ($request->training_date as $key => $value) {
            if ($value != '') {
                DriversTraining::create([
                    'date' => $value,
                    'theme' => $request->training_theme[$key],
                    'facilitator' => $request->training_facilitator[$key],
                    'duration' => $request->training_duration[$key],
                    'observation' => $request->training_observation[$key],
                    'driver_id' => $driver->id
                ]);
            }
        }
        return redirect()->route('drivers')->with('success','Se ha creado la documentación del conductor correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $id)
    {
        return view('logistics_infrastructure.drivers.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Drivers $id)
    {
        $users = User::where('state',1)->get();
        $vehicles = invVehicle::where('status','!=',0)->get();
        return view('logistics_infrastructure.drivers.edit',compact('id','users','vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drivers $id)
    {
        $request->validate([
            'user_id' => ['required','unique:drivers,user_id,'.$id->id]
        ]);

        $id->update($request->all());

        DriversReport::where('driver_id',$id->id)->delete();
        foreach ($request->report_date as $key => $value) {
            if ($value != '') {
                DriversReport::create([
                    'date' => $value,
                    'city' => $request->report_city[$key],
                    'vehicle_id' => $request->report_vehicle[$key],
                    'suject' => $request->report_suject[$key],
                    'observation' => $request->report_observation[$key],
                    'driver_id' => $id->id
                ]);
            }
        }
        DriversControl::where('driver_id',$id->id)->delete();
        foreach ($request->control_date as $key => $value) {
            if ($value != '') {
                DriversControl::create([
                    'date' => $value,
                    'city' => $request->control_city[$key],
                    'vehicle_id' => $request->control_vehicle[$key],
                    'suject' => $request->control_suject[$key],
                    'observation' => $request->control_observation[$key],
                    'driver_id' => $id->id
                ]);
            }
        }
        DriversAccident::where('driver_id',$id->id)->delete();
        foreach ($request->accident_date as $key => $value) {
            if ($value != '') {
                DriversAccident::create([
                    'date' => $value,
                    'city' => $request->accident_city[$key],
                    'vehicle_id' => $request->accident_vehicle[$key],
                    'zone' => $request->accident_zone[$key],
                    'details' => $request->accident_details[$key],
                    'driver_id' => $id->id
                ]);
            }
        }
        DriversExam::where('driver_id',$id->id)->delete();
        foreach ($request->exam_date as $key => $value) {
            if ($value != '') {
                DriversExam::create([
                    'date' => $value,
                    'type' => $request->exam_type[$key],
                    'result' => $request->exam_result[$key],
                    'commentary' => $request->exam_commentary[$key],
                    'driver_id' => $id->id
                ]);
            }
        }
        DriversTest::where('driver_id',$id->id)->delete();
        foreach ($request->test_date as $key => $value) {
            if ($value != '') {
                DriversTest::create([
                    'date' => $value,
                    'type' => $request->test_type[$key],
                    'result' => $request->test_result[$key],
                    'commentary' => $request->test_commentary[$key],
                    'driver_id' => $id->id
                ]);
            }
        }
        DriversTraining::where('driver_id',$id->id)->delete();
        foreach ($request->training_date as $key => $value) {
            if ($value != '') {
                DriversTraining::create([
                    'date' => $value,
                    'theme' => $request->training_theme[$key],
                    'facilitator' => $request->training_facilitator[$key],
                    'duration' => $request->training_duration[$key],
                    'observation' => $request->training_observation[$key],
                    'driver_id' => $id->id
                ]);
            }
        }

        return redirect()->route('drivers')->with('success','Se ha actualizado la documentación del conductor correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drivers $id)
    {
        $id->update(['update' => 0]);
        return redirect()->route('drivers')->with('success','Se ha eliminado la documentación del conductor correctamente');
    }

    public function download (Drivers $id)
    {
        return (new DriverDocument($id))->download('L-FR--18-'.$id->id.'_learned_leassons.xlsx');
    }
}
