<?php

namespace App\Http\Controllers\human_management;

use App\Exports\listPayPremium;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\human_management\Premium;
use App\Models\human_management\PremiumUser;
use App\Models\human_management\PremiumUserDetail;
use App\Models\system_setting;
use App\Models\SystemMessages;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class premiumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Digitar prima de servicios|Aprobar prima de servicios|Descargar lista de pago de prima de servicios|Eliminar formato de prima de servicios|Consultar prima de servicios',['only' => ['index']]);
        $this->middleware('permission:Consultar prima de servicios',['only' => ['show']]);
        $this->middleware('permission:Descargar lista de pago de prima de servicios',['only' => ['download']]);
        $this->middleware('permission:Digitar prima de servicios',['only' => ['create','store']]);
        $this->middleware('permission:Editar prima de servicios',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar formato de prima de servicios',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar prima de servicios',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $premiums = Premium::get();
        return view('human_management.premium.index',compact('premiums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        $message = $this->message;
        return view('human_management.premium.create',compact('users','message'));
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
        ]);

        $request['estado'] = 'Sin aprobar';
        $request['total_employees'] = count($request->user_add);
        $request['responsable_id'] = auth()->id();
        $request['date'] = now();
        $format = Premium::create($request->all());
        foreach ($request->user_add as $key => $value) {
            $user = PremiumUser::create([
                'work_id' => $format->id,
                'user_id' => $key,

                'linked_days' => $request->linked_days[$key],
                'license_days' => $request->license_days[$key],
                'settle_days' => $request->settle_days[$key],
                
                'total_devengado_salary' => $request->total_devengado_salary[$key],
                'total_devengado_extras' => $request->total_devengado_extras[$key],
                'total_devengado_assistance' => $request->total_devengado_assistance[$key],

                'average_salary' => $request->average_salary[$key],
                'average_extras' => $request->average_extras[$key],
                'average_assistance' => $request->average_assistance[$key],
                
                'total_pay_user' => $request->total_pay_user[$key],
                'status' => $request->status[$key],
            ]);

            foreach ($request->salary_month[$key] as $ke => $valu) {
                PremiumUserDetail::create([
                    'premium_user_id' => $user->id,
                    'month' => $ke,
                    'salary_month' => $request->salary_month[$key][$ke],
                    'extras_month' => $request->extras_month[$key][$ke],
                    'assistance_month' => $request->assistance_month[$key][$ke],
                ]);
            }
        }

        return redirect()->route('premium')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Premium $id)
    {
        return view('human_management.premium.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Premium $id)
    {
        $users = User::where('state',1)->get();
        $message = $this->message;
        return view('human_management.premium.edit',compact('users','message','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Premium $id)
    {
        $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required'],
        ]);

        $id->update($request->all());
        PremiumUser::where('work_id',$id->id)->delete();
        foreach ($request->user_add as $key => $value) {
            $user = PremiumUser::create([
                'work_id' => $id->id,
                'user_id' => $key,

                'linked_days' => $request->linked_days[$key],
                'license_days' => $request->license_days[$key],
                'settle_days' => $request->settle_days[$key],
                
                'total_devengado_salary' => $request->total_devengado_salary[$key],
                'total_devengado_extras' => $request->total_devengado_extras[$key],
                'total_devengado_assistance' => $request->total_devengado_assistance[$key],

                'average_salary' => $request->average_salary[$key],
                'average_extras' => $request->average_extras[$key],
                'average_assistance' => $request->average_assistance[$key],
                
                'total_pay_user' => $request->total_pay_user[$key],
                'status' => $request->status[$key],
            ]);

            foreach ($request->salary_month[$key] as $ke => $valu) {
                PremiumUserDetail::create([
                    'premium_user_id' => $user->id,
                    'month' => $ke,
                    'salary_month' => $request->salary_month[$key][$ke],
                    'extras_month' => $request->extras_month[$key][$ke],
                    'assistance_month' => $request->assistance_month[$key][$ke],
                ]);
            }
        }

        return redirect()->route('premium')->with('success','Se ha editado el formulario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Premium $id)
    {
        $id->delete();
        return redirect()->route('premium')->with('success','Se ha editado el formulario');
    }

    public function download(Premium $id)
    {
        return (new listPayPremium($id))->download($id->start_date.$id->end_date.'_PRIMA.xlsx');
    }

    public function approve(Request $request,Premium $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'estado'=>"Aprobado",
                'commentary'=>$request->commentary,
                'approver_id' => auth()->id(),
            ]);
            $id->responsable->notify(new notificationMain($id->id,'Se ha aprobado la prima de servicios '.$id->id,'finances/premium/show/'));
            // $i = 0;
            foreach ($id->users as $key => $data) {
                // PDF
                // $pdf = PDF::loadView('pdf.formulario8',compact('data'));
                // $pdf->setPaper('A4', 'landscape');
                // $pdf->save(storage_path('app/public/vouchers/'.$data->work->codigo_formulario.'-'.$id->id.'-'.$data->id.'_COMPROBANTE_PAGO.pdf'));
                // if ($i == 0) {
                    Mail::send('human_management.premium.email.users', ['data' => $data], function ($menssage) use ($id,$data)
                    {
                        $menssage->to($data->user->email,$data->user->name)->subject("Energitelco S.A.S, Comprobante de pago de prima de servicios ".$id->id.'-'.$data->id);
                        // $menssage->attachData($pdf->output(),'comprobante_pago.pdf');
                    });
                // }
                // $i++;
            }
            Mail::send('human_management.premium.email.main', ['format' => $id], function ($menssage) use ($id)
            {
                $emails = system_setting::where('state',1)->pluck('emails_contable')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++)
                {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsable->email,$id->responsable->name)->subject("Energitelco S.A.S PRIMA DE SERVICIOS ".$id->id);
            });
            
            return redirect()->back()->with(['success'=>'Se ha aprobado la solicitud '.$id->id.' correctamente']);
        }else {
            $id->update([
                'estado' => "No aprobado",
                'commentary'=>$request->commentary,
                'coordinador' => auth()->id(),
            ]);
            $id->responsable->notify(new notificationMain($id->id,'No se aprobó la solicitud de prima de servicio '.$id->id,'finances/premium/show/'));
            return redirect()->back()->with(['success'=>'Se ha desaprobado la solicitud correctamente']);
        }
    }

    public function export(Premium $id)
    {
        foreach ($id->users as $key => $data) {
            if ($data->user_id == auth()->id()) {
                $pdf = PDF::loadView('human_management.premium.pdf.main',compact('data'));
                $pdf->setPaper('A4', 'landscape');
                return $pdf->download($id->id.'-'.$data->id.'_COMPROBANTE_PAGO.pdf');
            }
        }
        return redirect()->route('home');
    }
}
