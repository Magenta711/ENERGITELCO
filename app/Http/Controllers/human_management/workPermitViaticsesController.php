<?php

namespace App\Http\Controllers\human_management;

use App\Exports\Work1Export;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\human_management\bonus\MinorBoxController;
use App\Http\Controllers\retiredUserController;
use App\Models\bonus\MinorBoxUser;
use App\Models\bonus\MinorBoxUserNew;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\Work1;
use App\Models\work1_cut_bonus;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

class workPermitViaticsesController extends Controller
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
        $cuts = work1_cut_bonus::with('responsable')->get();
        $minor_boxes = MinorBoxUser::with('user')->where('status',1)->get();
        return view('human_management.bonus.viatic.index',compact('cuts','minor_boxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cut = work1_cut_bonus::where('status',1)->get()->last();
        $now = now()->format('Y-m-d H:i:s');
        if ($cut){
            $items = Work1::whereBetween('created_at',[$cut->end_date,$now])->where('estado','!=','No aprobado')->get();
        }else {
            $items = Work1::whereBetween('created_at',['2021-01-05 11:14:00',$now])->where('estado','!=','No aprobado')->get();
        }
        return view('human_management.bonus.viatic.create',compact('items','now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cut = work1_cut_bonus::where('status','!=',0)->get()->last();
        if (!$cut) {
            $cut = work1_cut_bonus::where('status','!=',0)->get()->last();
        }
        $now = now();
        $items = Work1::whereBetween('created_at',[$cut->end_date,$now])->where('estado','!=','No aprobado')->get();

        if ($cut->status == 1 && count($items) > 0) {
            work1_cut_bonus::create([
                'user_id' => auth()->id(),
                'total' => 0,
                'has_bonus' => 0,
                'has_box' => 0,
                'value_box' => 0,
                'value_bonu' => 0,
                'start_date' => $cut->end_date,
                'end_date' => $now,
                'formats' => count($items),
                'status' => 3,
            ]);

            return redirect()->route('work_permit_viatics')->with('success','Se ha creado el corte de pago de comisiones correctamente');
        }else {
            if ($cut->status == 2) {
                return redirect()->back()->withErrors(['El ultimo corte se encuentra sin aprobar']);
            }
            if ($cut->status == 3) {
                return redirect()->back()->withErrors(['El ultimo corte se encuentra pendiente']);
            }
            if (count($items) == 0) {
                return redirect()->back()->withErrors(['No se encuentraron solicitudes de permisos de trabajo']);
            }
        }
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
                        $bonification = $item->work_add->f9a1u1 && is_numeric($item->work_add->f9a1u1) ? $item->work_add->f9a1u1 : 0;
                        $viatic = $item->work_add->f9a2u1 && is_numeric($item->work_add->f9a2u1) ? $item->work_add->f9a2u1 : 0;
                        $ajustes = $item->work_add->ajustes_u1 && is_numeric($item->work_add->ajustes_u1) ? $item->work_add->ajustes_u1 : 0;
                        $pending = $item->work_add->pending_u1 && is_numeric($item->work_add->pending_u1) ? $item->work_add->pending_u1 : 0;
                        break;
                    case(2):
                        $bonification = $item->work_add->f9a1u2 && is_numeric($item->work_add->f9a1u2) ? $item->work_add->f9a1u2 : 0;
                        $viatic = $item->work_add->f9a2u2 && is_numeric($item->work_add->f9a2u2) ? $item->work_add->f9a2u2 : 0;
                        $ajustes = $item->work_add->ajustes_u2 && is_numeric($item->work_add->ajustes_u2) ? $item->work_add->ajustes_u2 : 0;
                        $pending = $item->work_add->pending_u2 && is_numeric($item->work_add->pending_u2) ? $item->work_add->pending_u2 : 0;
                        break;
                    case(3):
                        $bonification = $item->work_add->f9a1u3 && is_numeric($item->work_add->f9a1u3) ? $item->work_add->f9a1u3 : 0;
                        $viatic = $item->work_add->f9a2u3 && is_numeric($item->work_add->f9a2u3) ? $item->work_add->f9a2u3 : 0;
                        $ajustes = $item->work_add->ajustes_u3 && is_numeric($item->work_add->ajustes_u3) ? $item->work_add->ajustes_u3 : 0;
                        $pending = $item->work_add->pending_u3 && is_numeric($item->work_add->pending_u3) ? $item->work_add->pending_u3 : 0;
                        break;
                    case(4):
                        $bonification = $item->work_add->f9a1u4 && is_numeric($item->work_add->f9a1u4) ? $item->work_add->f9a1u4 : 0;
                        $viatic = $item->work_add->f9a2u4 && is_numeric($item->work_add->f9a2u4) ? $item->work_add->f9a2u4 : 0;
                        $ajustes = $item->work_add->ajustes_u4 && is_numeric($item->work_add->ajustes_u4) ? $item->work_add->ajustes_u4 : 0;
                        $pending = $item->work_add->pending_u4 && is_numeric($item->work_add->pending_u4) ? $item->work_add->pending_u4 : 0;
                        break;
                    default:
                }

                if (array_key_exists($user->id,$array)) {
                    $bonus = $array[$user->id]['bonification'];
                    $viat = $array[$user->id]['viatic'];
                    $ajus = $array[$user->id]['ajustes'];
                    $pen = $array[$user->id]['pending'];
                    $count = $array[$user->id]['count'];
                    $array[$user->id] = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'cedula' => $user->cedula,
                        'cuenta' => $user->register ? $user->register->bank_account : '',
                        'bonification' => $bonification + $bonus,
                        'viatic' => $viatic + $viat,
                        'ajustes' => $ajustes + $ajus,
                        'pending' => $pending + $pen,
                        'count' => $count + 1
                    ];
                }else {
                    $array[$user->id] = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'cedula' => $user->cedula,
                        'cuenta' => $user->register ? $user->register->bank_account : '',
                        'bonification' => $bonification,
                        'viatic' => $viatic,
                        'ajustes' => $ajustes,
                        'pending' => $pending,
                        'count' => 1
                    ];
                }
                $i++;
            }
        }

        return view('human_management.bonus.viatic.show',compact('items','id','array'));
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
        $itemsAfter = MinorBoxController::getAfter($id->id);
        $minor_boxes = MinorBoxUser::with('user')->where('status',1)->get();
        return view('human_management.bonus.viatic.edit',compact('items','id','itemsAfter','minor_boxes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,work1_cut_bonus $id)
    {
        if ($id->status == 1 || $id->status == 0) {
            return redirect()->route('home')->withErrors(['Acción no valida']);
        }
        $items = Work1::whereBetween('created_at',[$id->start_date,$id->end_date])->where('estado','!=','No aprobado')->get();

        $total = 0;

        $total_value_box = $id->value_box;

        $user_pending = array();

        foreach ($items as $item) {
            $i = 0;
            foreach ($item->users as $user) {
                $i++;
                // if ($i<=4) {
                //     $total += ($request->bonus[$item->id][$user->id] && is_numeric($request->bonus[$item->id][$user->id])) ? $request->bonus[$item->id][$user->id] : 0;
                //     $total += ($request->viatic[$item->id][$user->id] && is_numeric($request->viatic[$item->id][$user->id])) ? $request->viatic[$item->id][$user->id] : 0;
                // }
                $pending = 0;
                if (!array_key_exists($user->id,$user_pending)) {
                    $wallet = MinorBoxUser::where('user_id',$user->id)->first();

                    if ($wallet) {
                        $pending = $wallet->pending;
                        $user_pending[$user->id] = true;
                    }
                }

                switch ($i) {
                    case 1:
                        $item->work_add->update([
                            // 'f9a1u1' => $request->bonus[$item->id][$user->id],
                            'f9a2u1' => $request->viatic[$item->id][$user->id],
                            'ajustes_u1' => $request->ajustes[$item->id][$user->id],
                            'pending_u1' => $pending,
                        ]);
                        break;
                    case 2:
                        $item->work_add->update([
                            // 'f9a1u2' => $request->bonus[$item->id][$user->id],
                            'f9a2u2' => $request->viatic[$item->id][$user->id],
                            'ajustes_u2' => $request->ajustes[$item->id][$user->id],
                            'pending_u2' => $pending,
                        ]);
                        break;
                    case 3:
                        $item->work_add->update([
                            // 'f9a1u3' => $request->bonus[$item->id][$user->id],
                            'f9a2u3' => $request->viatic[$item->id][$user->id],
                            'ajustes_u3' => $request->ajustes[$item->id][$user->id],
                            'pending_u3' => $pending,
                        ]);
                        break;
                    case 4:
                        $item->work_add->update([
                            // 'f9a1u4' => $request->bonus[$item->id][$user->id],
                            'f9a2u4' => $request->viatic[$item->id][$user->id],
                            'ajustes_u4' => $request->ajustes[$item->id][$user->id],
                            'pending_u4' => $pending,
                        ]);
                        break;
                    default:

                        break;
                }
            }
        }

        $id->update([
            // 'value' => $total + $total_value_box,
            // 'value_bonu' => $total,
            // 'plus' => $request->plus,
            'has_bonus' => 1,
            'status' => $id->has_box ? 2 : 3,
        ]);
        if ($id->has_box) {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Lista de bonificaciones de permisos de trabajo')){
                    $user->notify(new notificationMain($id->id,'Pago de comisiones a técnicos editado '.$id->id,'human_management/bonus/viatics/'));
                }
            }
        }

        return redirect()->route('work_permit_viatics')->with('success','Se ha actualizado el pago de comisiones correctamente');
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

    public function export($id)
    {
        $cut = work1_cut_bonus::find($id);
            $array = array();
            $items = Work1::whereBetween('created_at',[$cut->start_date,$cut->end_date])->where('estado','!=','No aprobado')->get();
            foreach ($items as $item) {
                $i = 1;
                foreach ($item->users as $user) {
                    $bonus = 0;
                    $viatic = 0;
                    $t3 = 0;
                    $aju = 0;
                    $deli = 0;
                    $pen = 0;
                    switch($i){
                        case(1):
                            $bonus = $item->work_add->f9a1u1 && is_numeric($item->work_add->f9a1u1) ? $item->work_add->f9a1u1 : 0;
                            $viatic = $item->work_add->f9a2u1 && is_numeric($item->work_add->f9a2u1) ? $item->work_add->f9a2u1 : 0;
                            $aju = $item->work_add->ajustes_u1 && is_numeric($item->work_add->ajustes_u1) ? $item->work_add->ajustes_u1 : 0;
                            $pen = $item->work_add->pending_u1 && is_numeric($item->work_add->pending_u1) ? $item->work_add->pending_u1 : 0;

                            $box = $item->work_add->f9a3u1 && is_numeric($item->work_add->f9a3u1) ? $item->work_add->f9a3u1 : 0;
                            $deli = $item->work_add->deliverable_u1 && is_numeric($item->work_add->deliverable_u1) ? $item->work_add->deliverable_u1 : 0;
                            $dis = $item->work_add->discharges_u1 && is_numeric($item->work_add->discharges_u1) ? $item->work_add->discharges_u1 : 0;
                            break;
                        case(2):
                            $bonus = $item->work_add->f9a1u2 && is_numeric($item->work_add->f9a1u2) ? $item->work_add->f9a1u2 : 0;
                            $viatic = $item->work_add->f9a2u2 && is_numeric($item->work_add->f9a2u2) ? $item->work_add->f9a2u2 : 0;
                            $aju = $item->work_add->ajustes_u2 && is_numeric($item->work_add->ajustes_u2) ? $item->work_add->ajustes_u2 : 0;
                            $pen = $item->work_add->pending_u2 && is_numeric($item->work_add->pending_u2) ? $item->work_add->pending_u2 : 0;

                            $box = $item->work_add->f9a3u2 && is_numeric($item->work_add->f9a3u2) ? $item->work_add->f9a3u2 : 0;
                            $deli = $item->work_add->deliverable_u2 && is_numeric($item->work_add->deliverable_u2) ? $item->work_add->deliverable_u2 : 0;
                            $dis = $item->work_add->discharges_u2 && is_numeric($item->work_add->discharges_u2) ? $item->work_add->discharges_u2 : 0;
                            break;
                        case(3):
                            $bonus = $item->work_add->f9a1u3 && is_numeric($item->work_add->f9a1u3) ? $item->work_add->f9a1u3 : 0;
                            $viatic = $item->work_add->f9a2u3 && is_numeric($item->work_add->f9a2u3) ? $item->work_add->f9a2u3 : 0;
                            $aju = $item->work_add->ajustes_u3 && is_numeric($item->work_add->ajustes_u3) ? $item->work_add->ajustes_u3 : 0;
                            $pen = $item->work_add->pending_u3 && is_numeric($item->work_add->pending_u3) ? $item->work_add->pending_u3 : 0;

                            $box = $item->work_add->f9a3u3 && is_numeric($item->work_add->f9a3u3) ? $item->work_add->f9a3u3 : 0;
                            $deli = $item->work_add->deliverable_u3 && is_numeric($item->work_add->deliverable_u3) ? $item->work_add->deliverable_u3 : 0;
                            $dis = $item->work_add->discharges_u3 && is_numeric($item->work_add->discharges_u3) ? $item->work_add->discharges_u3 : 0;
                            break;
                        case(4):
                            $bonus = $item->work_add->f9a1u4 && is_numeric($item->work_add->f9a1u4) ? $item->work_add->f9a1u4 : 0;
                            $viatic = $item->work_add->f9a2u4 && is_numeric($item->work_add->f9a2u4) ? $item->work_add->f9a2u4 : 0;
                            $aju = $item->work_add->ajustes_u4 && is_numeric($item->work_add->ajustes_u4) ? $item->work_add->ajustes_u4 : 0;
                            $pen = $item->work_add->pending_u4 && is_numeric($item->work_add->pending_u4) ? $item->work_add->pending_u4 : 0;

                            $box = $item->work_add->f9a3u4 && is_numeric($item->work_add->f9a3u4) ? $item->work_add->f9a3u4 : 0;
                            $deli = $item->work_add->deliverable_u4 && is_numeric($item->work_add->deliverable_u4) ? $item->work_add->deliverable_u4 : 0;
                            $dis = $item->work_add->discharges_u4 && is_numeric($item->work_add->discharges_u4) ? $item->work_add->discharges_u4 : 0;
                            break;
                        default:
                    }

                    if (array_key_exists($user->id,$array)) {
                        if ($cut->created_at <= '2021-12-10 24:00:00') {
                            $bonificacion = $array[$user->id]['bonificacion'];
                        }
                        $viaticos = $array[$user->id]['viaticos'];
                        $ajustes = $array[$user->id]['ajustes'];
                        $pending = $array[$user->id]['pending'];

                        $caja = $array[$user->id]['caja'];
                        $deliverable = $array[$user->id]['deliverable'];
                        $discharges = $array[$user->id]['discharges'];

                        $total_box = $array[$user->id]['total_box'] + $box + $dis;
                        $count = $array[$user->id]['count'];
                        if ($cut->created_at <= '2021-12-10 24:00:00') {
                            $total_bonus = $array[$user->id]['total_bonus'] + $bonus + $viatic + $pen - $aju;
                            $array[$user->id] = [
                                'id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'cedula' => $user->cedula,
                                'cuenta' => $user->register ? $user->register->bank_account : '',

                                'bonificacion' => $bonificacion +  $bonus,
                                'viaticos' => $viaticos + $viatic,
                                'ajustes' => $ajustes + $aju,
                                'pending' => $pending + $pen,

                                'caja' => $caja + $box,
                                'deliverable' => $deliverable + $deli,
                                'discharges' => $discharges + $dis,

                                'total_box' => $total_box,
                                'total_bonus' => $total_bonus,
                                'total' => $total_bonus + $total_box,
                                'count' => $count + 1
                            ];
                        }else {
                            $total_bonus = $array[$user->id]['total_bonus'] + $viatic + $pen - $aju;
                            $array[$user->id] = [
                                'id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'cedula' => $user->cedula,
                                'cuenta' => $user->register ? $user->register->bank_account : '',

                                // 'bonificacion' => $bonificacion +  $bonus,
                                'viaticos' => $viaticos + $viatic,
                                'ajustes' => $ajustes + $aju,
                                'pending' => $pending + $pen,

                                'caja' => $caja + $box,
                                'deliverable' => $deliverable + $deli,
                                'discharges' => $discharges + $dis,

                                'total_box' => $total_box,
                                'total_bonus' => $total_bonus,
                                'total' => $total_bonus + $total_box,
                                'count' => $count + 1
                            ];
                        }
                    }else {
                        if ($cut->created_at <= '2021-12-10 24:00:00') {
                            $array[$user->id] = [
                                'id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'cedula' => $user->cedula,
                                'cuenta' => $user->register ? $user->register->bank_account : '',

                                'bonificacion' => $bonus,
                                'viaticos' => $viatic,
                                'pending' => $pen,
                                'ajustes' => $aju,

                                'caja' => $box,
                                'deliverable' => $deli,
                                'discharges' => $dis,

                                'total_box' => $box + $dis,
                                'total_bonus' => $bonus + $viatic + $pen - $aju,
                                'total' => $box + $dis + $bonus + $viatic + $pen - $aju,
                                'count' => 1
                            ];
                        }else {
                            $array[$user->id] = [
                                'id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'cedula' => $user->cedula,
                                'cuenta' => $user->register ? $user->register->bank_account : '',

                                'viaticos' => $viatic,
                                'pending' => $pen,
                                'ajustes' => $aju,

                                'caja' => $box,
                                'deliverable' => $deli,
                                'discharges' => $dis,

                                'total_box' => $box + $dis,
                                'total_bonus' => $viatic + $pen - $aju,
                                'total' => $box + $dis + $viatic + $pen - $aju,
                                'count' => 1
                            ];
                        }
                    }
                    $i++;
                }
            }
        return (new Work1Export)->bonus($array,$cut)->download('Lista_Pagos_Corte_'.$id.'.xlsx');
    }

    public function approve(Request $request,work1_cut_bonus $id)
    {
        if ($request->status == 'Aprobado') {
            if (!$id->has_box) {
                return redirect()->back()->withErrors(['Desbes consolidar en la caja menor del corte']);
            }

            if (!$id->has_bonus) {
                return redirect()->back()->withErrors(['Desbes consolidar en la bonificación del corte']);
            }

            $now = now();
            $id->responsable->notify(new notificationMain($id->id,'Pago de comisiones a técnicos aprobado','human_management/bonus/viatics/'));
            $items = Work1::whereBetween('created_at',[$id->start_date, $id->end_date])->where('estado','!=','No aprobado')->get();
            $array = array();
            $AccTotalPagaViatic = 0;
            $AccTotalPagar = 0;
            $AccTotalPagarBox = 0;
            foreach ($items as $item) {
                $i = 1;
                foreach ($item->users as $user) {
                    $bonus = 0;
                    $viatic = 0;
                    $t3 = 0;
                    $aju = 0;
                    $deli = 0;
                    $pen = 0;
                    switch($i){
                        case(1):
                            // $bonus = $item->work_add->f9a1u1 && is_numeric($item->work_add->f9a1u1) ? $item->work_add->f9a1u1 : 0;
                            $viatic = $item->work_add->f9a2u1 && is_numeric($item->work_add->f9a2u1) ? $item->work_add->f9a2u1 : 0;
                            $aju = $item->work_add->ajustes_u1 && is_numeric($item->work_add->ajustes_u1) ? $item->work_add->ajustes_u1 : 0;
                            $pen = $item->work_add->pending_u1 && is_numeric($item->work_add->pending_u1) ? $item->work_add->pending_u1 : 0;

                            $box = $item->work_add->f9a3u1 && is_numeric($item->work_add->f9a3u1) ? $item->work_add->f9a3u1 : 0;
                            $deli = $item->work_add->deliverable_u1 && is_numeric($item->work_add->deliverable_u1) ? $item->work_add->deliverable_u1 : 0;
                            $dis = $item->work_add->discharges_u1 && is_numeric($item->work_add->discharges_u1) ? $item->work_add->discharges_u1 : 0;
                            break;
                        case(2):
                            // $bonus = $item->work_add->f9a1u2 && is_numeric($item->work_add->f9a1u2) ? $item->work_add->f9a1u2 : 0;
                            $viatic = $item->work_add->f9a2u2 && is_numeric($item->work_add->f9a2u2) ? $item->work_add->f9a2u2 : 0;
                            $aju = $item->work_add->ajustes_u2 && is_numeric($item->work_add->ajustes_u2) ? $item->work_add->ajustes_u2 : 0;
                            $pen = $item->work_add->pending_u2 && is_numeric($item->work_add->pending_u2) ? $item->work_add->pending_u2 : 0;

                            $box = $item->work_add->f9a3u2 && is_numeric($item->work_add->f9a3u2) ? $item->work_add->f9a3u2 : 0;
                            $deli = $item->work_add->deliverable_u2 && is_numeric($item->work_add->deliverable_u2) ? $item->work_add->deliverable_u2 : 0;
                            $dis = $item->work_add->discharges_u2 && is_numeric($item->work_add->discharges_u2) ? $item->work_add->discharges_u2 : 0;
                            break;
                        case(3):
                            // $bonus = $item->work_add->f9a1u3 && is_numeric($item->work_add->f9a1u3) ? $item->work_add->f9a1u3 : 0;
                            $viatic = $item->work_add->f9a2u3 && is_numeric($item->work_add->f9a2u3) ? $item->work_add->f9a2u3 : 0;
                            $aju = $item->work_add->ajustes_u3 && is_numeric($item->work_add->ajustes_u3) ? $item->work_add->ajustes_u3 : 0;
                            $pen = $item->work_add->pending_u3 && is_numeric($item->work_add->pending_u3) ? $item->work_add->pending_u3 : 0;

                            $box = $item->work_add->f9a3u3 && is_numeric($item->work_add->f9a3u3) ? $item->work_add->f9a3u3 : 0;
                            $deli = $item->work_add->deliverable_u3 && is_numeric($item->work_add->deliverable_u3) ? $item->work_add->deliverable_u3 : 0;
                            $dis = $item->work_add->discharges_u3 && is_numeric($item->work_add->discharges_u3) ? $item->work_add->discharges_u3 : 0;
                            break;
                        case(4):
                            // $bonus = $item->work_add->f9a1u4 && is_numeric($item->work_add->f9a1u4) ? $item->work_add->f9a1u4 : 0;
                            $viatic = $item->work_add->f9a2u4 && is_numeric($item->work_add->f9a2u4) ? $item->work_add->f9a2u4 : 0;
                            $aju = $item->work_add->ajustes_u4 && is_numeric($item->work_add->ajustes_u4) ? $item->work_add->ajustes_u4 : 0;
                            $pen = $item->work_add->pending_u4 && is_numeric($item->work_add->pending_u4) ? $item->work_add->pending_u4 : 0;

                            $box = $item->work_add->f9a3u4 && is_numeric($item->work_add->f9a3u4) ? $item->work_add->f9a3u4 : 0;
                            $deli = $item->work_add->deliverable_u4 && is_numeric($item->work_add->deliverable_u4) ? $item->work_add->deliverable_u4 : 0;
                            $dis = $item->work_add->discharges_u4 && is_numeric($item->work_add->discharges_u4) ? $item->work_add->discharges_u4 : 0;
                            break;
                        default:
                    }
                    if (array_key_exists($user->id,$array)) {
                        // $bonificacion = $array[$user->id]['bonificacion'];
                        $viaticos = $array[$user->id]['viaticos'];
                        $ajustes = $array[$user->id]['ajustes'];
                        $pending = $array[$user->id]['pending'];

                        $caja = $array[$user->id]['caja'];
                        $deliverable = $array[$user->id]['deliverable'];
                        $discharges = $array[$user->id]['discharges'];

                        $total_box = $array[$user->id]['total_box'] + $box + $dis;
                        $total_bonus = $array[$user->id]['total_bonus'] + $viatic + $pen - $aju;
                        $count = $array[$user->id]['count'];
                        $array[$user->id] = [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'cedula' => $user->cedula,
                            'cuenta' => $user->register ? $user->register->bank_account : '',

                            // 'bonificacion' => $bonificacion +  $bonus,
                            'viaticos' => $viaticos + $viatic,
                            'ajustes' => $ajustes + $aju,
                            'pending' => $pending + $pen,

                            'caja' => $caja + $box,
                            'deliverable' => $deliverable + $deli,
                            'discharges' => $discharges + $dis,

                            'total_box' => $total_box,
                            'total_bonus' => $total_bonus,
                            'total' => $total_bonus + $total_box,
                            'count' => $count + 1
                        ];
                    }else {
                        $array[$user->id] = [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'cedula' => $user->cedula,
                            'cuenta' => $user->register ? $user->register->bank_account : '',

                            // 'bonificacion' => $bonus,
                            'viaticos' => $viatic,
                            'pending' => $pen,
                            'ajustes' => $aju,

                            'caja' => $box,
                            'deliverable' => $deli,
                            'discharges' => $dis,

                            'total_box' => $box + $dis,
                            'total_bonus' => $viatic + $pen - $aju,
                            'total' => $box + $dis + $viatic + $pen - $aju,
                            'count' => 1
                        ];
                    }
                    $i++;
                }
            }
            foreach ($array as $item) {
                if ($item['total'] < 50000)
                {
                    $mensaje = 'Automático pendiente: '.$item['total'].' Comentario: En el corte '.$id->id.' no cumple con valor mínimo $50.000';
                    $minorUser = MinorBoxUser::where('user_id' ,$item['id'])->first();
                    if ($minorUser) {
                        $minorUser->update([
                            'responsable_id' => auth()->id(),
                            'charges' => $item['caja'] + $item['deliverable'],
                            'pending' => $item['total'],
                            'discharges' => 0,
                            'last_date' => $now,
                            'status' => 1,
                            'commentary' => null,
                            'history' => $minorUser->history.' '.now()->format('d/m/Y H:i:s').': '.$mensaje."\n",
                        ]);
                    }else{
                        MinorBoxUser::create([
                            'user_id' => $item['id'],
                            'responsable_id' => auth()->id(),
                            'charges' => $item['caja'] + $item['deliverable'],
                            'pending' => $item['total'],
                            'discharges' => 0,
                            'last_date' => $now,
                            'status' => 1,
                            'commentary' => null,
                            'history' => now()->format('d/m/Y H:i:s').': '.$mensaje."\n",
                        ]);
                    }
                }else{
                    $mensaje = now()->format('d/m/Y H:i:s').': Pago el corte '.$id->id.': $'.number_format($item['total'],0,',','.').' (Caja menor: $'.number_format($item['caja'],0,',','.').', viáticos: $'.number_format($item['viaticos'],0,',','.').', Otros: $'.number_format(($item['discharges'] + $item['pending'] - $item['ajustes']),0,',','.').') Por: '.auth()->user()->name."\n";

                    $minorUser = MinorBoxUser::where('user_id' ,$item['id'])->first();
                    if ($minorUser) {
                        $minorUser->update([
                            'responsable_id' => auth()->id(),
                            'charges' => $item['caja'] + $item['deliverable'],
                            'pending' => 0,
                            'discharges' => 0,
                            'last_date' => $now,
                            'status' => 1,
                            'commentary' => null,
                            'history' => $minorUser->history.' '.$mensaje,
                        ]);
                    }else{
                        MinorBoxUser::create([
                            'user_id' => $item['id'],
                            'responsable_id' => auth()->id(),
                            'charges' => $item['caja'] + $item['deliverable'],
                            'pending' => 0,
                            'discharges' => 0,
                            'last_date' => $now,
                            'status' => 1,
                            'commentary' => null,
                            'history' => $mensaje,
                        ]);
                    }
                    $AccTotalPagar += $item['total'];
                    $AccTotalPagaViatic += $item['total_bonus'];
                    $AccTotalPagarBox += $item['total_box'];
                }
                    Mail::send('human_management.bonus.viatic.mail.user', ['bonus' => $id,'item' => $item], function ($menssage) use ($item)
                    {
                        $menssage->to($item['email'],$item['name'])->subject("Energitelco S.A.S PAGO DE COMISIONES A TÉCNICOS APROBADO");
                    });
                sleep(1);
                $i++;
            }

            $id->update([
                'status' => 1,
                'approver_id' => auth()->id(),
                'total' => $AccTotalPagar,
                'value_bonu' => $AccTotalPagaViatic,
                'value_box' => $AccTotalPagarBox,
            ]);
            $plus = 0;
            $system = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();
            $pdf = PDF::loadView('human_management.bonus.viatic.pdf.main',compact('id','array','plus','system'));
            Mail::send('human_management.bonus.viatic.mail.main', ['bonus' => $id, 'users' => $array,'plus' => 0], function ($menssage) use ($id,$pdf)
            {
                $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsable->email,$id->responsable->name);
                $menssage->to('energitelco.011@gmail.com','ENERGITELCO SAS');
                $menssage->subject("Energitelco S.A.S PAGO DE COMISIONES A TÉCNICOS APROBADO");
                $menssage->attachData($pdf->output(), 'COMPROBANTE_EGRESOS.pdf');
            });
            $plus = $id->plus;
            $pdf = PDF::loadView('human_management.bonus.viatic.pdf.main',compact('id','array','plus','system'));
            Mail::send('human_management.bonus.viatic.mail.main', ['bonus' => $id, 'users' => $array,'plus' => $id->plus], function ($menssage) use ($id,$pdf)
            {
                $menssage->to('energitelco.011@gmail.com','ENERGITELCO SAS');
                $menssage->subject("Energitelco S.A.S PAGO DE COMISIONES A TÉCNICOS APROBADO");
                $menssage->attachData($pdf->output(), 'COMPROBANTE_EGRESOS.pdf');
            });
            return redirect()->back()->with(['success'=>'Se ha aprobado la comisión correctamente']);
        }else {
            $id->update(['status' => 0,'approver_id' => auth()->id()]);
            return redirect()->back()->with(['success'=>'Se ha desaprobado la comisión correctamente']);
        }
    }

}
