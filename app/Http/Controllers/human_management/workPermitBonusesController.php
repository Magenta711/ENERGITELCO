<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\human_management\cut_bonus;
use App\Models\system_setting;
use App\Models\Work1;
use App\Models\work1_add;
use App\Notifications\notificationMain;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
        // if ($id->status == 1 || $id->status == 0) {
        //     return redirect()->route('home')->withErrors(['Acción no valida']);
        // }
        $items = Work1::with(['work_add','users' => function ($query)
        {
            $query->with('minor_box');
        }])->whereBetween('created_at',[$id->start_date,$id->end_date])->where('estado','!=','No aprobado')->get();
        $data = array();
        foreach ($items as $key => $value) {
            $i = 1;
            foreach ($value->users as $ke => $user) {
                $data[$key][$i]['nombre_eb'] = $value->nombre_eb;
                $data[$key][$i]['id'] = $value->work_add->id;
                $data[$key][$i]['position'] = $i;
                $data[$key][$i]['user_id'] = $user->id;
                $data[$key][$i]['name'] = $user->name;
                $data[$key][$i]['created_at'] = $value->created_at;
                $data[$key][$i]['ended_at'] = $value->fecha_valido_hasta.' '.$value->hora_final;

                switch ($i) {
                    case 1:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u1;
                        break;
                    case 2:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u2;
                        break;
                    case 3:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u3;
                        break;
                    case 4:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u4;
                        break;
                    
                    default:
                        
                        break;
                }

                $i++;
            }
        }
        // return $data;
        $byStation = array();
        foreach ($data as $key => $value) {
            for ($i=1; $i <= count($value); $i++) {
                if ($byStation) {
                    $ready = false;
                    $position = null;
                    for ($k = 0; $k < count($byStation); $k++) {
                        if ($value[$i]['nombre_eb'] == $byStation[$k]['nombre_eb'] && !$ready) {
                            $position = $k;
                            if ($value[$i]['user_id'] == $byStation[$k]['user_id']) {
                                $byStation[$k]['bonus'] = $byStation[$k]['bonus'] + $value[$i]['bonus'];
                                $byStation[$k]['amount'] = $byStation[$k]['amount'] + 1;
                                $byStation[$k]['ended_at'] = $value[$i]['ended_at'];
                                $ready = true;
                            }
                        }
                    }
                    if (!$ready) {
                        if ($position != null) {
                            $arr = $value[$i];
                            $arr['amount'] = 1;
                            $arrSlice = array_slice($byStation,0,$position);
                            $arrSlice2 = array_slice($byStation,$position);
                            $arrSlice[] = $arr;
                            $byStation = array_merge($arrSlice, $arrSlice2);
                        }else {
                            $arr = $value[$i];
                            $arr['amount'] = 1;
                            $byStation[] = $arr;
                        }
                    }
                }else {
                    $arr = $value[$i];
                    $arr['amount'] = 1;
                    $byStation[] = $arr;
                    
                }
            }
        }
        $items = $byStation;
        
        return view('human_management.bonus.technical.show',compact('items','id'));
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
        $data = array();
        foreach ($items as $key => $value) {
            $i = 1;
            foreach ($value->users as $ke => $user) {
                $data[$key][$i]['nombre_eb'] = $value->nombre_eb;
                $data[$key][$i]['id'] = $value->work_add->id;
                $data[$key][$i]['position'] = $i;
                $data[$key][$i]['user_id'] = $user->id;
                $data[$key][$i]['name'] = $user->name;
                $data[$key][$i]['created_at'] = $value->created_at;
                $data[$key][$i]['ended_at'] = $value->fecha_valido_hasta.' '.$value->hora_final;

                switch ($i) {
                    case 1:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u1;
                        break;
                    case 2:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u2;
                        break;
                    case 3:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u3;
                        break;
                    case 4:
                        $data[$key][$i]['bonus'] = $value->work_add->f9a1u4;
                        break;
                    
                    default:
                        
                        break;
                }

                $i++;
            }
        }
        // return $data;
        $byStation = array();
        foreach ($data as $key => $value) {
            for ($i=1; $i <= count($value); $i++) {
                if ($byStation) {
                    $ready = false;
                    $position = null;
                    for ($k = 0; $k < count($byStation); $k++) {
                        if ($value[$i]['nombre_eb'] == $byStation[$k]['nombre_eb'] && !$ready) {
                            $position = $k;
                            if ($value[$i]['user_id'] == $byStation[$k]['user_id']) {
                                $byStation[$k]['bonus'] = $byStation[$k]['bonus'] + $value[$i]['bonus'];
                                $byStation[$k]['amount'] = $byStation[$k]['amount'] + 1;
                                $byStation[$k]['ended_at'] = $value[$i]['ended_at'];
                                $ready = true;
                            }
                        }
                    }
                    if (!$ready) {
                        if ($position != null) {
                            $arr = $value[$i];
                            $arr['amount'] = 1;
                            $arrSlice = array_slice($byStation,0,$position);
                            $arrSlice2 = array_slice($byStation,$position);
                            $arrSlice[] = $arr;
                            $byStation = array_merge($arrSlice, $arrSlice2);
                        }else {
                            $arr = $value[$i];
                            $arr['amount'] = 1;
                            $byStation[] = $arr;
                        }
                    }
                }else {
                    $arr = $value[$i];
                    $arr['amount'] = 1;
                    $byStation[] = $arr;
                    
                }
            }
        }
        $items = $byStation;
        return view('human_management.bonus.technical.edit',compact('items','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cut_bonus $id)
    {
        if ($id->status == 1 || $id->status == 0) {
            return redirect()->route('home')->withErrors(['Acción no valida']);
        }
        $items = work1_add::whereBetween('created_at',[$id->start_date,$id->end_date])->update([
            'f9a1u1' => 0,
            'f9a1u2' => 0,
            'f9a1u3' => 0,
            'f9a1u4' => 0
        ]);

        $total = 0;
        
        for ($i=0; $i < count($request->bonus); $i++) {
            
            switch ($request->position[$i]) {
                case 1:
                    work1_add::find($request->work_id[$i])->update([
                        'f9a1u1' => $request->bonus[$i],
                    ]);
                    $total += $request->bonus[$i];
                    break;
                case 2:
                    work1_add::find($request->work_id[$i])->update([
                        'f9a1u2' => $request->bonus[$i],
                    ]);
                    $total += $request->bonus[$i];
                    break;
                case 3:
                    work1_add::find($request->work_id[$i])->update([
                        'f9a1u3' => $request->bonus[$i],
                    ]);
                    $total += $request->bonus[$i];
                    break;
                case 4:
                    work1_add::find($request->work_id[$i])->update([
                        'f9a1u4' => $request->bonus[$i],
                    ]);
                    $total += $request->bonus[$i];
                    break;
                default:
                    
                break;
            }
        }

        $id->update([
            'total' => $total,
            'status' => 2,
        ]);
        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de bonificaciones de permisos de trabajo')){
                $user->notify(new notificationMain($id->id,'Pago de comisiones a técnicos editado '.$id->id,'human_management/bonus/viatics/'));
            }
        }

        return redirect()->route('bonuses_technical')->with('success','Se ha actualizado el pago de comisiones correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function approve(Request $request, cut_bonus $id)
    {
        if ($request->status == 'Aprobado') {
            $now = now();
            $id->responsable->notify(new notificationMain($id->id,'Pago de bonificaciones a técnicos aprobado','human_management/bonus/viatics/'));
            $items = Work1::whereBetween('created_at',[$id->start_date, $id->end_date])->where('estado','!=','No aprobado')->get();
            $array = array();
            $AccTotalPagar = 0;
            foreach ($items as $item) {
                $i = 1;
                foreach ($item->users as $user) {
                    $bonus = 0;
                    switch($i){
                        case(1):
                            $bonus = $item->work_add->f9a1u1 && is_numeric($item->work_add->f9a1u1) ? $item->work_add->f9a1u1 : 0;
                            break;
                        case(2):
                            $bonus = $item->work_add->f9a1u2 && is_numeric($item->work_add->f9a1u2) ? $item->work_add->f9a1u2 : 0;
                            break;
                        case(3):
                            $bonus = $item->work_add->f9a1u3 && is_numeric($item->work_add->f9a1u3) ? $item->work_add->f9a1u3 : 0;
                            break;
                        case(4):
                            $bonus = $item->work_add->f9a1u4 && is_numeric($item->work_add->f9a1u4) ? $item->work_add->f9a1u4 : 0;
                            break;
                        default:
                    }
                    if (array_key_exists($user->id,$array)) {
                        $bonificacion = $array[$user->id]['bonificacion'];
                        $total = $array[$user->id]['total'];
                        $count = $array[$user->id]['count'];
                        $array[$user->id] = [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'cedula' => $user->cedula,
                            'cuenta' => $user->register ? $user->register->bank_account : '',

                            'bonificacion' => $bonificacion +  $bonus,
                            'total' => $total + $bonus,
                            'count' => $count + 1
                        ];
                    }else {
                        $array[$user->id] = [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                            'cedula' => $user->cedula,
                            'cuenta' => $user->register ? $user->register->bank_account : '',

                            'bonificacion' => $bonus,
                            'total' => $bonus,
                            'count' => 1
                        ];
                    }
                    $i++;
                }
            }
            $i = 0;
            foreach ($array as $item) {
                if ($i < 2) {
                    Mail::send('human_management.bonus.technical.mail.user', ['bonus' => $id,'item' => $item], function ($menssage) use ($item)
                    {
                        $menssage->to($item['email'],$item['name'])->subject("Energitelco S.A.S PAGO DE BONIFICACIONES A TÉCNICOS APROBADO");
                    });
                }
                $i++;
            }
            $id->update([
                'status' => 1,
                'approver_id' => auth()->id(),
            ]);
            $plus = 0;
            $system = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();
            $pdf = PDF::loadView('human_management.bonus.technical.pdf.main',compact('id','array','plus','system'));
            Mail::send('human_management.bonus.technical.mail.main', ['bonus' => $id, 'users' => $array,'plus' => 0], function ($menssage) use ($id,$pdf)
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
                $menssage->subject("Energitelco S.A.S PAGO DE BONIFICACIONES A TÉCNICOS APROBADO");
                $menssage->attachData($pdf->output(), 'COMPROBANTE_EGRESOS.pdf');
            });
            $plus = $id->plus;
            $pdf = PDF::loadView('human_management.bonus.technical.pdf.main',compact('id','array','plus','system'));
            Mail::send('human_management.bonus.technical.mail.main', ['bonus' => $id, 'users' => $array,'plus' => $id->plus], function ($menssage) use ($id,$pdf)
            {
                $menssage->to('energitelco.011@gmail.com','ENERGITELCO SAS');
                $menssage->subject("Energitelco S.A.S PAGO DE BONIFICACIONES A TÉCNICOS APROBADO");
                $menssage->attachData($pdf->output(), 'COMPROBANTE_EGRESOS.pdf');
            });
            return redirect()->back()->with(['success'=>'Se ha aprobado la bonificación correctamente']);
        }else {
            $id->update(['status' => 0,'approver_id' => auth()->id()]);
            return redirect()->back()->with(['success'=>'Se ha desaprobado la bonificación correctamente']);
        }
    }
}
