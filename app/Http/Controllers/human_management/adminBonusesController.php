<?php

namespace App\Http\Controllers\human_management;

use App\Exports\bonusPayExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bonus\bonu;
use App\Models\bonus\bonusUser;
use App\Models\SystemMessages;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Mail;

class adminBonusesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de bonificaciones a administrativos y conductores|Crear bonificaciones a administrativos y conductores|Ver bonificaciones a administrativos y conductores|Editar bonificaciones a administrativos y conductores|Descargar bonificaciones a administrativos y conductores|Eliminar bonificaciones a administrativos y conductores|Aprobar bonificaciones a administrativos y conductores',['only' => ['index']]);
        $this->middleware('permission:Crear bonificaciones a administrativos y conductores',['only' => ['create','store']]);
        $this->middleware('permission:Ver bonificaciones a administrativos y conductores',['only' => ['show']]);
        $this->middleware('permission:Editar bonificaciones a administrativos y conductores',['only' => ['edit','update']]);
        $this->middleware('permission:Descargar bonificaciones a administrativos y conductores',['only' => ['download']]);
        $this->middleware('permission:Eliminar bonificaciones a administrativos y conductores',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar bonificaciones a administrativos y conductores',['only' => ['approve']]);

        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonus = bonu::get();
        return view('human_management.bonus.administrative.index',compact('bonus'));
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
        return view('human_management.bonus.administrative.create',compact('users','message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['status'] = 2;
        $request['total_employees'] = count($request->user_add);
        $request['responsable_id'] = auth()->id();
        $request['date'] = now();
        $id = bonu::create($request->all());
        foreach ($request->user_add as $key => $value) {
            bonusUser::create([
                'bonus_id' => $id->id,
                'user_id' => $key,

                'value_bonus' => $request->value_bonus[$key],

                'admin_bonus_check' => isset($request->admin_bonus_check[$key]) ? 1 : 0 ,
                'drive_bonus_check' => isset($request->drive_bonus_check[$key]) ? 1 : 0 ,
                'na_check' => isset($request->na_check[$key]) ? 1 : 0 ,

                'admin_1' => $request->admin_1[$key],
                'admin_2' => $request->admin_2[$key],
                'admin_3' => $request->admin_3[$key],
                'admin_4' => $request->admin_4[$key],
                'admin_5' => $request->admin_5[$key],
                'admin_6' => $request->admin_6[$key],
                'admin_7' => $request->admin_7[$key],
                'admin_8' => $request->admin_8[$key],
                'admin_9' => $request->admin_9[$key],
                'admin_10' => $request->admin_10[$key],
                'admin_11' => $request->admin_11[$key],
                'admin_12' => $request->admin_12[$key],
                
                'driver_1' => $request->driver_1[$key],
                'driver_2' => $request->driver_2[$key],
                
                'percentage_admin' => $request->percentage_admin[$key],
                'total_admin' => $request->total_admin[$key],
                'total_dirver' => $request->total_dirver[$key],
                'total_user' => $request->total_user[$key],
                'commentary' => $request->commentary[$key],
            ]);
        }
        
        return redirect()->route('admin_bonuses')->with('success','Se ha registrado las bonificaciones administradores y conductores correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(bonu $id)
    {
        return view('human_management.bonus.administrative.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(bonu $id)
    {
        $message = $this->message;
        return view('human_management.bonus.administrative.edit',compact('id','message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,bonu $id)
    {
        $request['estado'] = 'Sin aprobar';
        $request['total_employees'] = count($request->user_add);
        $request['responsable'] = auth()->id();
        $request['date'] = now();
        $id->update($request->all());
        foreach ($id->users as $key => $value) {
            $value->update([
                'value_bonus' => $request->value_bonus[$value->user_id],

                'admin_bonus_check' => isset($request->admin_bonus_check[$value->user_id]) ? 1 : 0,
                'drive_bonus_check' => isset($request->drive_bonus_check[$value->user_id]) ? 1 : 0,
                'na_checked_' => isset($request->na_checked_[$value->user_id]) ? 1 : 0,

                'admin_1' => $request->admin_1[$value->user_id],
                'admin_2' => $request->admin_2[$value->user_id],
                'admin_3' => $request->admin_3[$value->user_id],
                'admin_4' => $request->admin_4[$value->user_id],
                'admin_5' => $request->admin_5[$value->user_id],
                'admin_6' => $request->admin_6[$value->user_id],
                'admin_7' => $request->admin_7[$value->user_id],
                'admin_8' => $request->admin_8[$value->user_id],
                'admin_9' => $request->admin_9[$value->user_id],
                'admin_10' => $request->admin_10[$value->user_id],
                'admin_11' => $request->admin_11[$value->user_id],
                'admin_12' => $request->admin_12[$value->user_id],
                
                'driver_1' => $request->driver_1[$value->user_id],
                'driver_2' => $request->driver_2[$value->user_id],
                
                'percentage_admin' => $request->percentage_admin[$value->user_id],
                'total_admin' => $request->total_admin[$value->user_id],
                'total_dirver' => $request->total_dirver[$value->user_id],
                'total_user' => $request->total_user[$value->user_id],
                'commentary' => $request->commentary[$value->user_id],
            ]);
        }
        return redirect()->route('admin_bonuses')->with('success','Se ha actualizado las bonificaciones administradores y conductores correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(bonu $id)
    {
        $id->delete();
        return redirect()->route('admin_bonuses')->with('success','Se ha eliminado las bonificaciones administradores y conductores correctamente');
    }

    public function download(bonu $id)
    {
        return (new bonusPayExport($id))->download($id->id.'-LISTA_DE_PAGO_BONIFICACIONES.xlsx');
    }

    public function approve(Request $request, bonu $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'status' => 1,
                'approve_id' => auth()->id(),
                'commentary'=>$request->commentary,
            ]);
            Mail::send('human_management.bonus.administrative.email.main', ['id' => $id], function ($menssage) use ($id)
            {
                $menssage->to('energitelco.011@gmail.com','ENERGITELCO SAS')->subject("Energitelco S.A.S, Notificación de pago de bonificaciones");
            });
            foreach ($id->users as $data) {
                if ($data->user->id == 1) {
                    Mail::send('human_management.bonus.administrative.email.user', ['data' => $data,'id' => $id], function ($menssage) use ($data)
                    {
                        $menssage->to($data->user->email,$data->user->name)->subject("Energitelco S.A.S, Notificación de pago de bonificaciones");
                    });
                }
            }
            $id->responsable->notify(new notificationMain($id->id,'Se ha aprobado las el pago de las bonificaciones a administradores y conductores'.$id->id,'human_management/bonus/administratives/show/'));
            return redirect()->route('admin_bonuses')->with('success','Se ha aprobado el pago de las bonificaciones administradores y conductores correctamente');
        }else {
            $id->update([
                'status' => 0,
                'commentary'=>$request->commentary,
                'approve_id' => auth()->id(),
            ]);
            $id->responsable->notify(new notificationMain($id->id,'No se aprobó las el pago de bonificaciones a administradores y conductores'.$id->id,'human_management/bonus/administratives/show/'));
            return redirect()->route('admin_bonuses')->with('success','Se ha reprobado el pago de las bonificaciones administradores y conductores correctamente');
        }
    }
}
