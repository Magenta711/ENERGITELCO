<?php

namespace App\Http\Controllers\human_management;

use App\Exports\payrollOvertimeNewsReportExport;
use App\Exports\Work8Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work8;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\SystemMessages;
use App\Models\Work8Users;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;
use App\User;

class payrollOvertimeNewsReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Digitar reporte de novedades de nómina y horas extras|Aprobar reporte de novedades de nómina y horas extras|Descargar lista de pago de reporte de novedades de nómina y horas extras|Eliminar formato de reporte de novedades de nómina y horas extras|Consultar reporte de novedades de nómina y horas extras',['only' => ['index']]);
        $this->middleware('permission:Consultar reporte de novedades de nómina y horas extras',['only' => ['show']]);
        $this->middleware('permission:Descargar lista de pago de reporte de novedades de nómina y horas extras',['only' => ['download']]);
        $this->middleware('permission:Digitar reporte de novedades de nómina y horas extras',['only' => ['create','store']]);
        $this->middleware('permission:Editar reporte de novedades de nómina y horas extras',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar formato de reporte de novedades de nómina y horas extras',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar reporte de novedades de nómina y horas extras',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $payrolls = Work8::with(['coordinadorAcargo','responsableAcargo'])->get();
        return  view('human_management.payroll_over_time.index',compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('state',1)->get();
        $message = $this->message;
        return view('human_management.payroll_over_time.create',compact('usuarios','message'));
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
            'start_date' => ['required'],
            'end_date' => ['required'],
            'value_assistance' => ['required'],
        ]);
        $request['estado'] = 'Sin aprobar';
        $request['total_employees'] = count($request->user_add);
        $request['responsable'] = auth()->id();
        $request['date'] = now();
        $format = Work8::create($request->all());
        foreach ($request->user_add as $key => $value) {
            Work8Users::create([
                'work_id' => $format->id,
                'user_id' => $key,
                
                'salary' => $request->salary[$key],

                'assistance' => isset($request->assistance[$key]) ? $request->assistance[$key] : 0,
                'health' => isset($request->health[$key]) ? $request->health[$key] : 0,
                'pension' => isset($request->pension[$key]) ? $request->pension[$key] : 0,

                'unpaid_leave' => $request->unpaid_leave[$key],
                'working_days' => $request->working_days[$key],
                'disabilities_1' => $request->disabilities_1[$key],
                'disabilities_2' => $request->disabilities_2[$key],
                
                'discounts' => $request->discounts[$key],
                
                'extras_sc' => $request->extras_sc[$key],
                'surcharge_n' => $request->surcharge_n[$key],
                'extras_d' => $request->extras_d[$key],
                'extras_dc' => $request->extras_dc[$key],
                'extras_n' => $request->extras_n[$key],
                'extras_s' => $request->extras_s[$key],
                'holyday_n' => $request->holyday_n[$key],
                'extras_hn' => $request->extras_hn[$key],

                'unpaid_leave_tx' => $request->unpaid_leave_tx[$key],
                'disabilities_1_tx' => $request->disabilities_1_tx[$key],
                'disabilities_2_tx' => $request->disabilities_2_tx[$key],
                'extras_sc_tx' => $request->extras_sc_tx[$key],
                'surcharge_n_tx' => $request->surcharge_n_tx[$key],
                'extras_d_tx' => $request->extras_d_tx[$key],
                'extras_dc_tx' => $request->extras_dc_tx[$key],
                'extras_n_tx' => $request->extras_n_tx[$key],
                'extras_s_tx' => $request->extras_s_tx[$key],
                'holyday_n_tx' => $request->holyday_n_tx[$key],
                'extras_hn_tx' => $request->extras_hn_tx[$key],
                'total_devengado_tx' => $request->total_devengado_tx[$key],
                'assistance_tx' => $request->assistance_tx[$key],
                'health_tx' => $request->health_tx[$key],
                'pension_tx' => $request->pension_tx[$key],
                'discounts_tx' => $request->discounts_tx[$key],
                
                'total_pay' => $request->total_pay_user[$key],
                'status' => $request->status[$key],
            ]);
        }

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar reporte de novedades de nómina y horas extras')){
                $user->notify(new notificationMain($format->id,'Solicitud de reporte de novedades y horas extras '.$format->id,'human_management/payroll_overtime_news_report/show/'));
            }
        }
          
        // Notificar

        return redirect()->route('payroll_overtime_news_report')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work8::with([
            'coordinadorAcargo'=>function ($query)
            {
                $query->with('roles');
            },
            'responsableAcargo'=>function ($query)
            {
                $query->with('roles');
            },
            'work_adds'=>function ($query)
            {
                $query->with('user');
            },
        ])->find($id);
        return view('human_management.payroll_over_time.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Work8 $id)
    {
        $message = $this->message;
        return view('human_management.payroll_over_time.edit',compact('id','message'));
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
        $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required'],
            'value_assistance' => ['required'],
        ]);
        $format = Work8::find($id);
        $request['total_employees'] = count($request->user_add);
        $format->update($request->all());
        foreach ($format->work_adds as $value) {
            $value->update([
                'salary' => $request->salary[$value->user_id],

                'assistance' => isset($request->assistance[$value->user_id]) ? $request->assistance[$value->user_id] : 0,
                'health' => isset($request->health[$value->user_id]) ? $request->health[$value->user_id] : 0,
                'pension' => isset($request->pension[$value->user_id]) ? $request->pension[$value->user_id] : 0,

                'unpaid_leave' => $request->unpaid_leave[$value->user_id],
                'working_days' => $request->working_days[$value->user_id],
                'disabilities_1' => $request->disabilities_1[$value->user_id],
                'disabilities_2' => $request->disabilities_2[$value->user_id],
                
                'discounts' => $request->discounts[$value->user_id],
                
                'extras_sc' => $request->extras_sc[$value->user_id],
                'surcharge_n' => $request->surcharge_n[$value->user_id],
                'extras_d' => $request->extras_d[$value->user_id],
                'extras_dc' => $request->extras_dc[$value->user_id],
                'extras_n' => $request->extras_n[$value->user_id],
                'extras_s' => $request->extras_s[$value->user_id],
                'holyday_n' => $request->holyday_n[$value->user_id],
                'extras_hn' => $request->extras_hn[$value->user_id],

                'unpaid_leave_tx' => $request->unpaid_leave_tx[$value->user_id],
                'disabilities_1_tx' => $request->disabilities_1_tx[$value->user_id],
                'disabilities_2_tx' => $request->disabilities_2_tx[$value->user_id],
                'extras_sc_tx' => $request->extras_sc_tx[$value->user_id],
                'surcharge_n_tx' => $request->surcharge_n_tx[$value->user_id],
                'extras_d_tx' => $request->extras_d_tx[$value->user_id],
                'extras_dc_tx' => $request->extras_dc_tx[$value->user_id],
                'extras_n_tx' => $request->extras_n_tx[$value->user_id],
                'extras_s_tx' => $request->extras_s_tx[$value->user_id],
                'holyday_n_tx' => $request->holyday_n_tx[$value->user_id],
                'extras_hn_tx' => $request->extras_hn_tx[$value->user_id],
                'total_devengado_tx' => $request->total_devengado_tx[$value->user_id],
                'assistance_tx' => $request->assistance_tx[$value->user_id],
                'health_tx' => $request->health_tx[$value->user_id],
                'pension_tx' => $request->pension_tx[$value->user_id],
                'discounts_tx' => $request->discounts_tx[$value->user_id],
                
                'total_pay' => $request->total_pay_user[$value->user_id],
                'status' => $request->status[$value->user_id],
            ]);
        }

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar reporte de novedades de nómina y horas extras')){
                $user->notify(new notificationMain($format->id,'Se edito reporte de novedades y horas extras '.$format->id,'human_management/payroll_overtime_news_report/show/'));
            }
        }

        // Notificar

        return redirect()->route('payroll_overtime_news_report')->with('success','Se ha editado el formato correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work8 $id)
    {
        $id->delete();
        return redirect()->route('payroll_overtime_news_report')->with('success','Se ha eliminado el formato correctamente');
    }
    
    /**
     * Download in pdf the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Work8 $id)
    {
        return (new Work8Export($id))->download(time().'_pays.xlsx');
    }

    public function export(Work8 $id)
    {
        foreach ($id->work_adds as $key => $data) {
            if ($data->user_id == auth()->id()) {
                $pdf = PDF::loadView('human_management.payroll_over_time.pdf.main',compact('data'));
                $pdf->setPaper('A4', 'landscape');
                return $pdf->download($id->codigo_formulario.'-'.$id->id.'-'.$data->id.'_COMPROBANTE_PAGO.pdf');
            }
        }
        return redirect()->route('home');
    }

    public function export2(Work8 $id)
    {
        return (new payrollOvertimeNewsReportExport)->actives($id)->download($id->start_date.$id->end_date.'_REPORTE_DE_NOMINA.xlsx');
    }
    
    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function approve(Request $request,Work8 $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'estado'=>"Aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);
            $id->responsableAcargo->notify(new notificationMain($id->id,'Se ha aprobado un reporte de novedades y horas horas extras '.$id->id,'human_management/payroll_overtime_news_report/show/'));
            // PDF
            foreach ($id->work_adds as $key => $data) {
                // $pdf = PDF::loadView('pdf.formulario8',compact('data'));
                // $pdf->setPaper('A4', 'landscape');
                // $pdf->save(storage_path('app/public/vouchers/'.$data->work->codigo_formulario.'-'.$id->id.'-'.$data->id.'_COMPROBANTE_PAGO.pdf'));
                    Mail::send('human_management.payroll_over_time.mail.users', ['data' => $data], function ($menssage) use ($id,$data)
                    {
                        $menssage->to($data->user->email,$data->user->name)->subject("Energitelco S.A.S, Comprobante de pago ".$data->work->codigo_formulario.'-'.$id->id.'-'.$data->id);
                        // $menssage->attachData($pdf->output(),'comprobante_pago.pdf');
                    });
            }
            Mail::send('human_management.payroll_over_time.mail.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $usuario = User::find($id->responsable);
                $menssage->to($usuario->email,$usuario->name)->subject("Energitelco S.A.S H-FR-14 REPORTE DE NOVEDADES DE NOMINA Y HORAS EXTRAS EXITOSA ".$id->id);
            });
            
            return redirect()->back()->with(['success'=>'Se ha aprobado la solicitud '.$id->id.' correctamente']);
        }else {
            $id->update([
                'estado' => "No aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);
            $id->responsableAcargo->notify(new notificationMain($id->id,'No se aprobó la solicitud de Reporte de novedades y horas extras '.$id->id,'human_management/payroll_overtime_news_report/show/'));
            return redirect()->back()->with(['success'=>'Se ha desaprobado la solicitud correctamente']);
        }
    }
}