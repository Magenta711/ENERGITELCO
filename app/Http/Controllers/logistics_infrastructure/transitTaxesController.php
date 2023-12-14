<?php

namespace App\Http\Controllers\logistics_infrastructure;

use App\DriversReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\invVehicle;
use App\Models\invVehicleReport;
use App\Models\transitTaxes;
use App\User;
use Carbon\Carbon;

class transitTaxesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de cortes de multas|Editar cortes de multas|Ver cortes de multas',['only' => ['index']]);
        $this->middleware('permission:Editar cortes de multas',['only' => ['edit','update']]);
        $this->middleware('permission:Ver cortes de multas',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::getWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        $time = Carbon::now();
        $start_date  = $time->startOfWeek()->format('Y-m-d');
        $end_date  = $time->endOfWeek()->format('Y-m-d');
        
        // get this cut or create
        $ready = transitTaxes::where('start_date',$start_date)->where('end_date',$end_date)->first();
        if (!$ready) {
            transitTaxes::create([
                'status' => 0,
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);
        }

        $transit_taxes = transitTaxes::get();

        return view('logistics_infrastructure.transit_taxes.index',compact('transit_taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #
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
    public function show(transitTaxes $id)
    {
        $vehicles = invVehicle::get();
        return view('logistics_infrastructure.transit_taxes.show',compact('id','vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(transitTaxes $id)
    {
        Carbon::getWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);
   
        $time = Carbon::now();
        $start_date = $time->startOfWeek()->format('Y-m-d');
        $end_date = $time->endOfWeek()->format('Y-m-d');

        if ($id->start_date <= $start_date && $id->end_date >= $end_date) {
            $vehicles = invVehicle::get();
            $users = User::get();

            $id->update(['status' => 1]);

            return view('logistics_infrastructure.transit_taxes.edit',compact('vehicles','id','users'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta vista');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,transitTaxes $id)
    {
        Carbon::getWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        $time = Carbon::now();
        $start_date = $time->startOfWeek()->format('Y-m-d');
        $end_date = $time->endOfWeek()->format('Y-m-d');

        invVehicleReport::whereBetween('date',[$start_date,$end_date])->delete();

        DriversReport::whereBetween('date',[$start_date,$end_date])->delete();

        foreach ($request->report_date as $key => $value) {
            for ($i=0; $i < count($value); $i++) {
                if (isset($value[$i]) && $value[$i] && isset($request->report_driver_id[$key][$i]) && $request->report_driver_id[$key][$i]) {
                    invVehicleReport::create([
                        'vehicle_id' => $key,
                        'date' => $value[$i],
                        'place' => $request->report_city[$key][$i],
                        'area' => 'rural',
                        'type' => 'summons'
                    ]);
                    DriversReport::create([
                        'date' => $value[$i],
                        'city' => $request->report_city[$key][$i],
                        'vehicle_id' => $key,
                        'suject' => $request->report_suject[$key][$i],
                        'observation' => $request->report_observation[$key][$i],
                        'driver_id' => $request->report_driver_id[$key][$i],
                        'status' => $request->report_status[$key][$i]
                    ]);
                }
            }
        }

        return redirect()->route('transit_taxes')->with('success','Se ha actualizado el reporte de multas');
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
