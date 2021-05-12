<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\human_magement\settlement;
use App\Models\human_magement\settlementSalaryMonth;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\human_magement\settlementYear;
use App\User;
use Illuminate\Support\Facades\Mail;

class settlementController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Lista de liquidación de prestaciones sociales',['only' => ['index']]);
        $this->middleware('permission:Crear liquidación de prestaciones sociales',['only' => ['create','store']]);
        $this->middleware('permission:Ver liquidación de prestaciones sociales',['only' => ['show']]);
        $this->middleware('permission:Editar liquidación de prestaciones sociales',['only' => ['edit','update']]);
        $this->middleware('permission:Descargar liquidación de prestaciones sociales',['only' => ['download']]);
        $this->middleware('permission:Eliminar liquidación de prestaciones sociales',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar liquidación de prestaciones sociales',['only' => ['approve']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settlements = settlement::get();
        return view('human_management.settlement.index',compact('settlements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::where('state',1)->get();
        return view('human_management.settlement.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['status'] = 0;
        $request['responsable_id'] = auth()->id();
        $id = settlement::create($request->all());
        
        for ($i=0; $i < count($request->years); $i++) { 
            settlementYear::create([
                'settlement_id' => $id->id,
                'years' => $request->years[$i],
                'days_linked' => $request->days_linked[$i],
                'days_leave' => $request->days_leave[$i],
                'days_to_settle' => $request->days_to_settle[$i],
            ]);
        }

        for ($i=0; $i < count($request->salary_month); $i++) {
            settlementSalaryMonth::create([
                'settlement_id' => $id->id,
                'salary_month' => $request->salary_month[$i],
                'extras_month' => $request->extras_month[$i],
                'assistance_month' => $request->assistance_month[$i],
            ]);
        }

        return redirect()->route('settlement')->with('success','Se ha guardado la liquidación correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(settlement $id)
    {
        return view('human_management.settlement.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(settlement $id)
    {
        $users= User::where('state',1)->get();
        return view('human_management.settlement.edit',compact('users','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,settlement $id)
    {
        $request['status'] = 0;
        $request['responsable_id'] = auth()->id();
        $id->update($request->all());

        $id->years()->delete();
        
        for ($i=0; $i < count($request->years); $i++)
        {
            settlementYear::create([
                'settlement_id' => $id->id,
                'years' => $request->years[$i],
                'days_linked' => $request->days_linked[$i],
                'days_leave' => $request->days_leave[$i],
                'days_to_settle' => $request->days_to_settle[$i],
            ]);
        }
        $i = 0;
        foreach ($id->months as $value)
        {
            $value->update([
                'settlement_id' => $id->id,
                'salary_month' => $request->salary_month[$i],
                'extras_month' => $request->extras_month[$i],
                'assistance_month' => $request->assistance_month[$i],
            ]);
            $i++;
        }
        return redirect()->route('settlement')->with('success','Se ha actualizado la liquidación correctamente');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(settlement $id)
    {
        $id->delete();
        return redirect()->route('settlement')->with('success','Se ha eliminado la liquidación correctamente');
    }
    
    public function approve(Request $request,settlement $id)
    {
        if ($request->status == 'Aprobado') {
            $pdf = PDF::loadView('human_management.settlement.pdf.main',compact('id'));
            $pdf->setPaper('A4', 'landscape');
            $id->update([
                'status' => 1,
                'commentary' => $request->commentary,
                'approve_id' => auth()->id(),
            ]);
            Mail::send('human_management.settlement.email.main', ['id' => $id], function ($menssage) use ($id,$pdf)
            {
                $menssage->to($id->responsable->email,$id->responsable->name)->subject("Energitelco S.A.S PAGO DE COMISIONES A TÉCNICOS APROBADO");
                $menssage->attachData($pdf->output(), 'LIQUIDACION.pdf');
            });
            return redirect()->route('settlement')->with('success','Se ha aprobado la liquidación correctamente');
        }else {
            $id->update([
                'status' => 0,
                'commentary' => $request->commentary,
                'approve_id' => auth()->id(),
            ]);
            
            return redirect()->route('settlement')->with('success','Se ha desaprobado la liquidación correctamente');
        }
    }
    
    public function download(settlement $id)
    {
        if ($id->status == 1) {
            $pdf = PDF::loadView('human_management.settlement.pdf.main',compact('id'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->download($id->id.'-LIQUIDACION.pdf');
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }
}
