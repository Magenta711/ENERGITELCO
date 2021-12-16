<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\human_management\cut_bonus;
use App\Models\Work1;
use Carbon\Carbon;

class workPermitBonusesController extends Controller
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
        $this->middleware('permission:Aprobar bonificaciones de permisos de trabajo',['only' => ['approve']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuts = cut_bonus::with('responsable')->get();
        return view('human_management.bonus.technical.index',compact('cuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cut = cut_bonus::where('status','!=',0)->get()->last();
        $now = now();
        if (!$cut) {
            $items = Work1::whereBetween('created_at',['2021-12-10 24:00:00',$now])->where('estado','!=','No aprobado')->get();
        }else {
            $items = Work1::whereBetween('created_at',[$cut->end_date,$now])->where('estado','!=','No aprobado')->get();
        }
        
        if ((!$cut || ($cut && $cut->status == 1)) && count($items) > 0) {
            cut_bonus::create([
                'user_id' => auth()->id(),
                'total' => 0,
                'value' => 0,
                'start_date' => $cut->end_date ?? Carbon::create('2021-12-10 24:00:00'),
                'end_date' => $now,
                'formats' => count($items),
                'status' => 3,
            ]);

            return redirect()->route('bonuses_technical')->with('success','Se ha creado el corte de pago de comisiones correctamente');
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
    public function show(cut_bonus $id)
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
    public function edit(cut_bonus $id)
    {
        if ($id->status == 1 || $id->status == 0) {
            return redirect()->route('home')->withErrors(['Acción no valida']);
        }
        $items = Work1::with(['work_add','users' => function ($query)
        {
            $query->with('minor_box');
        }])->whereBetween('created_at',[$id->start_date,$id->end_date])->where('estado','!=','No aprobado')->get();
        return view('human_management.bonus.viatic.edit',compact('items','id'));
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
        //
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
