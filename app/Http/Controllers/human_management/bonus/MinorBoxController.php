<?php

namespace App\Http\Controllers\human_management\bonus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bonus\MinorBoxUser;
use App\Models\Work1;
use App\Models\work1_cut_bonus;
use App\User;
use App\Notifications\notificationMain;
use Carbon\Carbon;

class MinorBoxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de bonificaciones de permisos de trabajo|Crear corte bonificaciones de permisos de trabajo|Editar bonificaciones de permisos de trabajo|Ver bonificaciones de permisos de trabajo|Aprobar bonificaciones de permisos de trabajo|Exportar bonificaciones de permisos de trabajo',['only' => ['index']]);
        $this->middleware('permission:Ver bonificaciones de permisos de trabajo',['only' => ['show']]);
        $this->middleware('permission:Exportar bonificaciones de permisos de trabajo',['only' => ['export']]);
        $this->middleware('permission:Crear corte bonificaciones de permisos de trabajo',['only' => ['create','store']]);
        $this->middleware('permission:Editar bonificaciones de permisos de trabajo',['only' => ['edit','update']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuts = work1_cut_bonus::with('responsable')->get();
        $cuts = work1_cut_bonus::with('responsable')->get();
        $users = User::where('state',1)->get(['id','name','cedula']);
        $minor_boxes = MinorBoxUser::with('user')->where('status',1)->get();
        return view('human_management.bonus.minor_box.index',compact('cuts','users','minor_boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show(work1_cut_bonus $id)
    {
        $items = Work1::whereBetween('created_at',[$id->start_date, $id->end_date])->where('estado','!=','No aprobado')->get(); 

        $array = array();
        $m = 0;
        foreach ($items as $item) {
            $i = 1;
            foreach ($item->users as $user) {
                switch($i){
                    case(1):
                        $t3 = $item->work_add->f9a3u1 && is_numeric($item->work_add->f9a3u1) ? $item->work_add->f9a3u1 : 0;
                        $deli = $item->work_add->deliverable_u1 && is_numeric($item->work_add->deliverable_u1) ? $item->work_add->deliverable_u1 : 0;
                        $dis = $item->work_add->discharges_u1 && is_numeric($item->work_add->discharges_u1) ? $item->work_add->discharges_u1 : 0;
                        break;
                    case(2):
                        $t3 = $item->work_add->f9a3u2 && is_numeric($item->work_add->f9a3u2) ? $item->work_add->f9a3u2 : 0;
                        $deli = $item->work_add->deliverable_u2 && is_numeric($item->work_add->deliverable_u2) ? $item->work_add->deliverable_u2 : 0;
                        $dis = $item->work_add->discharges_u2 && is_numeric($item->work_add->discharges_u2) ? $item->work_add->discharges_u2 : 0;
                        break;
                    case(3):
                        $t3 = $item->work_add->f9a3u3 && is_numeric($item->work_add->f9a3u3) ? $item->work_add->f9a3u3 : 0;
                        $deli = $item->work_add->deliverable_u3 && is_numeric($item->work_add->deliverable_u3) ? $item->work_add->deliverable_u3 : 0;
                        $dis = $item->work_add->discharges_u3 && is_numeric($item->work_add->discharges_u3) ? $item->work_add->discharges_u3 : 0;
                        break;
                    case(4):
                        $t3 = $item->work_add->f9a3u4 && is_numeric($item->work_add->f9a3u4) ? $item->work_add->f9a3u4 : 0;
                        $deli = $item->work_add->deliverable_u4 && is_numeric($item->work_add->deliverable_u4) ? $item->work_add->deliverable_u4 : 0;
                        $dis = $item->work_add->discharges_u4 && is_numeric($item->work_add->discharges_u4) ? $item->work_add->discharges_u4 : 0;
                        break;
                    default:
                }
                
                if (array_key_exists($user->id,$array)) {
                    $caja = $array[$user->id]['caja'];
                    $deliverable = $array[$user->id]['deliverable'];
                    $discharges = $array[$user->id]['discharges'];
                    $count = $array[$user->id]['count'];
                    $array[$user->id] = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'cedula' => $user->cedula,
                        'cuenta' => $user->register ? $user->register->bank_account : '',
                        'caja' => $caja + $t3,
                        'discharges' => $discharges + $dis,
                        'deliverable' => $deliverable + $deli,
                        'count' => $count + 1
                    ];
                }else {
                    $array[$user->id] = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'cedula' => $user->cedula,
                        'cuenta' => $user->register ? $user->register->bank_account : '',
                        'deliverable' => $deli,
                        'discharges' => $dis,
                        'caja' => $t3,
                        'count' => 1
                    ];
                }
                $i++;
            }
        }

        return view('human_management.bonus.minor_box.show',compact('items','id','array'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(work1_cut_bonus $id)
    {
        if ($id->status == 1 || $id->status == 0) {
            return redirect()->route('home')->withErrors(['Acción no valida']);
        }
        $items = Work1::with(['work_add','users' => function ($query)
        {
            $query->with('minor_box');
        }])->whereBetween('created_at',[$id->start_date,$id->end_date])->where('estado','!=','No aprobado')->get();
        
        $itemsAfter = $this->getAfter($id->id);
        $minor_boxes = MinorBoxUser::with('user')->where('status',1)->get();
        return view('human_management.bonus.minor_box.edit',compact('items','id','itemsAfter','minor_boxes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response  
     */
    public function update(Request $request, work1_cut_bonus $id)
    {
        if ($id->status == 1 || $id->status == 0) {
            return redirect()->route('home')->withErrors(['Acción no valida']);
        }
        $items = Work1::whereBetween('created_at',[$id->start_date,$id->end_date])->where('estado','!=','No aprobado')->get();

        $users_minor = array();
        
        foreach ($items as $item) {
            $i = 0;
            foreach ($item->users as $user) {
                $i++;
                
                $minor_box = 0;
                $discharges = 0;
                if (!array_key_exists($user->id,$users_minor)) {

                    $wallet = MinorBoxUser::where('user_id',$user->id)->first();
    
                    if ($wallet) {
                        $minor_box = $wallet->charges;
                        $discharges = $wallet->discharges;
                        $users_minor[$user->id] = true;
                    }
                }
                
                switch ($i) {
                    case 1:
                        $item->work_add->update([
                            'f9a3u1' => $request->box[$item->id][$user->id],
                            'deliverable_u1' => $minor_box,
                            'discharges_u1' => $discharges,
                        ]);
                        break;
                    case 2:
                        $item->work_add->update([
                            'f9a3u2' => $request->box[$item->id][$user->id],
                            'deliverable_u2' => $minor_box,
                            'discharges_u2' => $discharges,
                        ]);
                        break;
                    case 3:
                        $item->work_add->update([
                            'f9a3u3' => $request->box[$item->id][$user->id],
                            'deliverable_u3' => $minor_box,
                            'discharges_u3' => $discharges,
                        ]);
                        break;
                    case 4:
                        $item->work_add->update([
                            'f9a3u4' => $request->box[$item->id][$user->id],
                            'deliverable_u4' => $minor_box,  
                            'discharges_u4' => $discharges,
                        ]);
                        break;
                    default:
                        
                        break;
                }
            }
        }

        $id->update([
            'has_box' => 1,
            'status' => $id->has_bonus ? 2 : 3,
        ]);
        
        if ($id->has_bonus) {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Aprobar bonificaciones de permisos de trabajo')){
                    $user->notify(new notificationMain($id->id,'Pago de comisiones a tecnicos editado '.$id->id,'human_management/work_permit/bonus/'));
                }
            }
        }

        return redirect()->route('bonus_minor_box')->with('success','Se ha actualizado el pago de comisiones correctamente');
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

    public function add_user(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
        ]);
        $minor_box = MinorBoxUser::where('user_id',$request->user_id)->first();
        if ($minor_box) {
            $status = 0;
            $val = $request->value ? $request->value : 0;
            $dis = $request->discharges ? $request->discharges : 0;

            $value = $minor_box->charges + $val;
            $discharges = $minor_box->discharges + $dis;
            if ($value > $discharges) {
                $total_value = $value - $discharges;
                $total_discharges = 0;
                $smAcc = "tiene un total de ".$total_value;
            }else {
                $total_discharges = $discharges - $value;
                $total_value = 0;
                $smAcc = "se le debe un total de ".$total_discharges;
            }

            $msValue = '';
            if ($request->value > 0) {
                $msValue = 'cargo: '.$request->value.' ';
            }
            $msDischarges = '';
            if ($request->discharges > 0) {
                $msDischarges = 'descargo: '.$request->discharges.' ';
            }

            $history = now()->format('d/m/Y H:i:s').': Manual '.$msValue.$msDischarges.'y '.$smAcc.' Por: '.auth()->user()->name.' Comentario:'.$request->commentary."\n";

            $minor_box->update([
                'responsable_id' => auth()->id(),
                'charges' => $total_value,
                'discharges' => $total_discharges,
                'last_date' => now(),
                'status' => 1,
                'commentary' => $request->commentary,
                'history' => $minor_box->history.' '.$history,
            ]);
        }else {
            $status = 0;
            $val = $request->value ? $request->value : 0;
            $dis = $request->discharges ? $request->discharges : 0;

            if ($val > 0 && $dis > 0) {
                if ($val > $dis) {
                    $val = $val - $dis;
                    $dis = 0;
                    $smAcc = "tiene un total de ".$val;
                }else {
                    $dis = $dis -$val;
                    $val = 0;
                    $smAcc = "se le debe un total de ".$dis;
                }
            }else {
                if ($request->value > 0) {
                    $smAcc = "tiene un total de ".$request->value;
                }
                if ($request->discharges > 0) {
                    $smAcc = "se le debe un total de ".$request->discharges;
                }
            }
            $msValue = '';
            if ($request->value > 0) {
                $msValue = 'cargo: '.$request->value.' ';
            }
            $msDischarges = '';
            if ($request->discharges > 0) {
                $msDischarges = 'descargo: '.$request->discharges.' ';
            }


            $minor_box = MinorBoxUser::Create(
                [
                    'user_id' => $request->user_id,
                    'responsable_id' => auth()->id(),
                    'charges' => $val,
                    'discharges' => $dis,
                    'last_date' => now(),
                    'pending' => 0,
                    'status' =>  1,
                    'commentary' => $request->commentary,
                    'history' => now()->format('d/m/Y H:i:s').': Manual '.$msValue.$msDischarges.'y '.$smAcc.' Por: '.auth()->user()->name.' Comentario:'.$request->commentary."\n",
                ]
            );
        }

        return redirect()->route('bonus_minor_box')->with('success','Se ha registrado correctamente los valores a '.$minor_box->user->name);
    }

    public static function getAfter($id)
    {
        if ($id) {
            $cut = work1_cut_bonus::where('id','<',$id)->orderBy('id','DESC')->get()->first();
            if (!$cut) {
                $cut = work1_cut_bonus::where('id','<',$id)->orderBy('id','DESC')->get()->first();
            }
            if ($cut && $cut->status == 1) {
                $start = Carbon::create($cut->end_date)->format('Y-m-d 00:00:00');
                $items = Work1::with(['work_add','users' => function ($query)
                {
                    $query->with('minor_box');
                }])->whereBetween('created_at',[$start,$cut->end_date])->where('estado','!=','No aprobado')->get();
                return $items;
            }else {
                return MinorBoxController::getAfter($id-1);
            }
        }
        return null;
    }
}
