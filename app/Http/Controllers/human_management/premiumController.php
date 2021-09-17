<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\human_management\Premium;
use App\Models\human_management\PremiumUser;
use App\Models\human_management\PremiumUserDetail;
use App\Models\SystemMessages;
use App\User;

class premiumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        // $this->middleware('permission:Digitar reporte de novedades de nómina y horas extras|Aprobar reporte de novedades de nómina y horas extras|Descargar lista de pago de reporte de novedades de nómina y horas extras|Eliminar formato de reporte de novedades de nómina y horas extras|Consultar reporte de novedades de nómina y horas extras',['only' => ['index']]);
        // $this->middleware('permission:Consultar reporte de novedades de nómina y horas extras',['only' => ['show']]);
        // $this->middleware('permission:Descargar lista de pago de reporte de novedades de nómina y horas extras',['only' => ['download']]);
        // $this->middleware('permission:Digitar reporte de novedades de nómina y horas extras',['only' => ['create','store']]);
        // $this->middleware('permission:Editar reporte de novedades de nómina y horas extras',['only' => ['edit','update']]);
        // $this->middleware('permission:Eliminar formato de reporte de novedades de nómina y horas extras',['only' => ['destroy']]);
        // $this->middleware('permission:Aprobar reporte de novedades de nómina y horas extras',['only' => ['approve']]);
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
    public function destroy($id)
    {
        //
    }
}
