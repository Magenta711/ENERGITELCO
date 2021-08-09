<?php

namespace App\Http\Controllers\human_management;

use App\Exports\bonusPayExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bonus24;
use App\Models\bonus\bonu;
use App\Models\bonus\bonusUser;
use App\Models\SystemMessages;
use App\Models\Work1;
use App\Models\work1_cut_bonus;
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
        $bonus = work1_cut_bonus::whereYear('created_at',now())->whereMonth('created_at',now())->get();
        foreach ($bonus as $key => $value) {
            $bonusTechnical[$key] = $this->getCutBonusTechnical($value);
        }
        return $bonusTechnical;
        return view('human_management.bonus.administrative.create',compact('users','message','bonusTechnical'));
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
                
                'working_days' => $request->working_days[$key],
                'value_bonus' => $request->value_bonus[$key],

                'admin_bonus_check' => isset($request->admin_bonus_check[$key]) ? 1 : 0 ,
                'drive_bonus_check' => isset($request->drive_bonus_check[$key]) ? 1 : 0 ,
                'b24_7_check' => isset($request->b24_7_check[$key]) ? 1 : 0 ,
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
                
                'carro' => isset($request->carro[$key]) ? 1 : 0,
                'moto' => isset($request->moto[$key]) ? 1 : 0,
                'driver_1' => $request->driver_1[$key],
                'driver_2' => $request->driver_2[$key],

                'bonus_24_7' => $request->bonus_24_7[$key],
                'state_24_7' => $request->state_24_7[$key],
                'last_24_7' => $request->last_24_7[$key],
                'time_24_7' => $request->time_24_7[$key],

                'discount' => $request->discount[$key],
                
                'percentage_admin' => $request->percentage_admin[$key],
                'total_admin' => $request->total_admin[$key],
                'total_dirver' => $request->total_dirver[$key],
                'total_user' => $request->total_user[$key],
                'commentary' => $request->commentary[$key],
            ]);

            $u = User::find($key);
            if ($u->b24_7 || $u->time != '') {
                $u->update([
                    'cut_24_7' => $id->created_at,
                    'time_24_7' => null,
                ]);
            }
            foreach ($u->report_24_7 as $item) {
                if ($item->status == 0) {
                    $item->update([
                        'bonus_id' => $id->id,
                        'status' => 1
                    ]);
                }
            }
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
                'working_days' => $request->working_days[$value->user_id],

                'admin_bonus_check' => isset($request->admin_bonus_check[$value->user_id]) ? 1 : 0,
                'drive_bonus_check' => isset($request->drive_bonus_check[$value->user_id]) ? 1 : 0,
                'na_checked_' => isset($request->na_checked_[$value->user_id]) ? 1 : 0,
                'b24_7_check' => isset($request->b24_7_check[$value->user_id]) ? 1 : 0 ,

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

                'bonus_24_7' => $request->bonus_24_7[$value->user_id],
                'state_24_7' => $request->state_24_7[$value->user_id],
                'last_24_7' => $request->last_24_7[$value->user_id],
                'time_24_7' => $request->time_24_7[$value->user_id],
                
                'carro' => isset($request->carro[$value->user_id]) ? 1 : 0,
                'moto' => isset($request->moto[$value->user_id]) ? 1 : 0,
                'driver_1' => $request->driver_1[$value->user_id],
                'driver_2' => $request->driver_2[$value->user_id],
                
                'discount' => $request->discount[$value->user_id],
                
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
                Mail::send('human_management.bonus.administrative.email.user', ['data' => $data,'id' => $id], function ($menssage) use ($data)
                {
                    $menssage->to($data->user->email,$data->user->name)->subject("Energitelco S.A.S, Notificación de pago de bonificaciones");
                });
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

    public function getCutBonusTechnical($cut)
    {
        $items = Work1::whereBetween('created_at',[$cut->start_date, $cut->end_date])->where('estado','!=','No aprobado')->get();

        $array = array();
        $m = 0;
        foreach ($items as $item) {
            $i = 1;
            foreach ($item->users as $user) {
                switch($i){
                    case(1):
                        $bonification = $item->work_add->f9a1u1 && is_numeric($item->work_add->f9a1u1) ? $item->work_add->f9a1u1 : 0;
                        break;
                    case(2):
                        $bonification = $item->work_add->f9a1u2 && is_numeric($item->work_add->f9a1u2) ? $item->work_add->f9a1u2 : 0;
                        break;
                    case(3):
                        $bonification = $item->work_add->f9a1u3 && is_numeric($item->work_add->f9a1u3) ? $item->work_add->f9a1u3 : 0;
                        break;
                    case(4):
                        $bonification = $item->work_add->f9a1u4 && is_numeric($item->work_add->f9a1u4) ? $item->work_add->f9a1u4 : 0;
                        break;
                    default:
                }
                
                if (array_key_exists($user->id,$array)) {
                    $bonus = $array[$user->id]['bonification'];
                    $array[$user->id] = [
                        'id' => $user->id,
                        'bonification' => $bonification + $bonus,
                    ];
                }else {
                    $array[$user->id] = [
                        'id' => $user->id,
                        'bonification' => $bonification,
                    ];
                }
                $i++;
            }
        }

        return $array;
    }
}
