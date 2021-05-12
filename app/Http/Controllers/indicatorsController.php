<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\IndicatorMonth;
use App\Models\IndicatorRegister;
use Illuminate\Http\Request;

class indicatorsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de indicadores|Crear indicadores|Informe de indicadores|Seguimiento de indicadores|Administración de indicadores',['only' => ['index']]);
        $this->middleware('permission:Crear indicadores',['only' => ['create','store']]);
        $this->middleware('permission:Informe de indicadores',['only' => ['show']]);
        $this->middleware('permission:Administración de indicadores',['only' => ['edit','update']]);
        $this->middleware('permission:Seguimiento de indicadores',['only' => ['tracing','save']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicators = Indicator::get(['id','name','process_id']);
        return view('indicators.index',compact('indicators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('indicators.create');
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
            'name' => ['required'],
            'goal' => ['required'],
            'formula' => ['required'],
            'periodicity' => ['required'],
            'process_id' => ['required'],
            'month_breack' => ['required'],
        ]);
        $indicator = Indicator::create($request->all());
        //hasMany month_alert
        if ($request->month_alert) {
            for ($i=0; $i < count($request->month_alert); $i++) {
                $week = explode('-W',$request->month_alert[$i]);
                IndicatorMonth::create([
                    'week' => $week[1],
                    'type' => 2,
                    'indicator_id' => $indicator->id,
                ]);
            }
        }
        //hasMany month_breack
        for ($i=0; $i < count($request->month_breack); $i++) { 
            $week = explode('-W',$request->month_breack[$i]);
            IndicatorMonth::create([
                'week' => $week[1],
                'type' => 1,
                'indicator_id' => $indicator->id,
            ]);
        }
        
        return redirect()->route('indicators')->with('success','Se ha creado el indicador correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Indicator $id)
    {
        return view('indicators.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicator $id)
    {
        return view('indicators.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Indicator $id)
    {
        $request->validate([
            'name' => ['required'],
            'goal' => ['required'],
            'formula' => ['required'],
            'periodicity' => ['required'],
            'process_id' => ['required'],
            'month_breack' => ['required'],
        ]);
        $id->update($request->all());
        IndicatorMonth::where('indicator_id',$id->id)->update(['status' => 0]);
        //hasMany month_alert
        if ($request->month_alert) {
            for ($i=0; $i < count($request->month_alert); $i++) { 
                $week = explode('-W',$request->month_alert[$i]);
                if (isset($request->month_alert_id[$i])) {
                    IndicatorMonth::find($request->month_alert_id[$i])->update([
                        'week' => $week[1],
                        'type' => 2,
                        'indicator_id' => $id->id,
                        'status' => 1,
                    ]);
                }else{
                    IndicatorMonth::create([
                        'week' => $week[1],
                        'type' => 2,
                        'indicator_id' => $id->id,
                        'status' => 1,
                    ]);
                }
            }
        }
        //hasMany month_breack
        for ($i=0; $i < count($request->month_breack); $i++) { 
            $week = explode('-W',$request->month_breack[$i]);
            if (isset($request->month_breack_id[$i])) {
                IndicatorMonth::find($request->month_breack_id[$i])->update([
                    'week' => $week[1],
                    'type' => 1,
                    'indicator_id' => $id->id,
                    'status' => 1,
                ]);
            }else {
                IndicatorMonth::create([
                    'week' => $week[1],
                    'type' => 1,
                    'indicator_id' => $id->id,
                    'status' => 1,
                ]);
            }
        }
        return redirect()->route('indicators')->with('success','Se ha editado el indicador correctamente');
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

    public function tracing(Indicator $id)
    {
        return view('indicators.tracing',compact('id'));
    }

    public function save(Request $request,Indicator $id)
    {
        $lastCut = $id->lastCut();
        $register = $id->lastRegister();
        if ($register) {
            $register->update([
                'date' => now(),
                'value' => $request->value,
                'goal' => $id->goal,
                'formula' => $id->hasFormula
            ]);
        }else {
            $register = IndicatorRegister::create([
                'date' => now(),
                'value' => $request->value,
                'goal' => $id->goal,
                'cut' => $lastCut,
                'formula' => $id->hasFormula,
                'indicator_id' => $id->id,
                'status' => 1
            ]);
        }
        // Notificar
        return redirect()->route('indicators')->with('success','Se ha actualizado el registro actual del indicador correctamente');
    }

    // Alertas
}
