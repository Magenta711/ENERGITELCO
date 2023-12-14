<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bonus\MinorBoxUser;
use App\Models\chargeAccount;
use App\Models\general_setting;
use App\Models\system_setting;
use App\SignatureChargeAccount;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;

class chargeaccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Lista de cuentas de cobro|Lista de cuentas de cobro propias|Generar cuenta de cobro abierta|Crear cuenta de cobro|Ver cuenta de cobro|Aprobar cuenta de cobro|Eliminar cuenta de cobro',['only' => ['index']]);
        $this->middleware('permission:Generar cuenta de cobro abierta',['only' => ['generate']]);
        $this->middleware('permission:Ver cuenta de cobro',['only' => ['show']]);
        $this->middleware('permission:Aprobar cuenta de cobro',['only' => ['approve']]);
        $this->middleware('permission:Eliminar cuenta de cobro',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargeAccounts = chargeAccount::get();
        return view('human_management/chargeaccount/index',compact('chargeAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(string $token = null)
    {
        if ($token && !auth()->check()) {
            $signature = chargeAccount::where('token',$token)->where('status',3)->first();
            if ($signature) {
                return view('human_management/chargeaccount/create',compact('token','signature'));
            }
            return redirect('/home');
        }else if(auth()->check() && !$token) {
            if (auth()->user()->hasPermissionTo('Crear cuenta de cobro')) {
                return view('human_management/chargeaccount/create',compact('token'));
            }
        }
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->check()) {
            $request->validate([
                'city' => ['required'],
                'date' => ['required'],
                'name' => ['required'],
                'document' => ['required'],
                'concept' => ['required'],
                'value' => ['required'],
                'expense_type' => ['required'],
            ]);
        }else {
            $request->validate([
                'city' => ['required'],
                'date' => ['required'],
                'name' => ['required'],
                'document' => ['required'],
                'concept' => ['required'],
                'value' => ['required'],
                'bank_account' => ['required'],
                'type_bank_account' => ['required'],
            ]);
        }

        if ($request->signature_id) {
            $signature = SignatureChargeAccount::where('name',$request->signature_id)->where('status',0)->first();
            if ($signature) {
                if ($request->token) {
                    $chargeAccount = chargeAccount::where('token',$request->token)->where('status',3)->first();
                    $request['status'] = 0;
                    $chargeAccount->update($request->all());
                    $signature->update([
                        'signaturable_type' => 'App\Models\chargeAccount',
                        'signaturable_id' => $chargeAccount->id,
                        'status' => 1
                    ]);
                }else {
                    $request['user_id'] = auth()->id();
                    $chargeAccount = chargeAccount::create($request->all());
                    $signature->update([
                        'signaturable_type' => 'App\Models\chargeAccount',
                        'signaturable_id' => $chargeAccount->id,
                        'status' => 1
                    ]);
                }
                if($request->hasFile('files')){
                    for ($i=0; $i < count($request->file('files')); $i++) {
                        $file = $request->file('files')[$i];
                        $name = time().str_random().'.'.$file->getClientOriginalExtension();
                        if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                            Image::make($file->getRealPath())
                                ->resize(null, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save(public_path('storage/upload/chargeAccount/'.$name));
                        }else{
                            $path = Storage::putFileAs('public/upload/chargeAccount/', $file, $name);
                        }
                        $chargeAccount->files()->create([
                            'nombre'=>$name,
                            'formulario'=>$chargeAccount->id,
                            'extencion' => $file->getClientOriginalExtension(),
                        ]);
                    }
                }
                return redirect()->route('chargeaccount')->with('success','Se ha enviado la cuenta de cobro correctamente');
            }
        }
        return redirect()->back()->withErrors(['No se valido firma'])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(chargeAccount $id)
    {
        return view('human_management/chargeaccount/show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy(chargeAccount $id)
    {
        $id->delete();
        return redirect()->back()->with(['success'=>'Se ha eliminado la cuenta de cobro correctamente']);
    }

    public function generate()
    {
        chargeAccount::create([
            'token' => time().str_random(),
            'user_id' => auth()->id(),
            'date' => now(),
            'status' => 3
        ]);
        return redirect()->back()->with(['success'=>'Se ha generado una cuenta de cobro correctamente']);
    }

    public function signature(Request $request)
    {
        $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->imagen));
        $name = time().str_random();
        $safeName = $name.'.png';
        Storage::put('private/signature/'.$safeName, $image, 'private');
        SignatureChargeAccount::create([
            'name' => $name,
            'file' => $safeName,
            'status' => 0
        ]);
        return response()->json( $name );
    }

    public function approve(Request $request, chargeAccount $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'status' => 1,
                'approve_id' => auth()->id()
            ]);
            if (!$id->token && $id->expense_type == 'Caja menor') {
                $minor_box = MinorBoxUser::where('user_id',$id->user_id)->first();
                $total_value = 0;
                $total_discharges = 0;

                if ($minor_box) {
                    $value = $minor_box->charges - $id->value;
                    if ($value >= 0) {
                        $total_value = $value; //Error
                        $smAcc = "tiene un total de $".number_format($total_value,0,',','.');
                    }else {
                        $total_discharges = $id->value - $minor_box->charges; //Error
                        $smAcc = "se le debe un total de $".number_format($total_discharges,0,',','.');
                    }
                    $history = now()->format('d/m/Y H:i:s').': Cuenta de cobro '.$id->id.' descargo $'.$id->value.' y '.$smAcc.' Por: '.auth()->user()->name.' Comentario:'.$request->commentary." \n";
                    $minor_box->update([
                        'responsable_id' => auth()->id(),
                        'charges' => $total_value,
                        'discharges' => $total_discharges,
                        'last_date' => now(),
                        'status' => 1,
                        'commentary' => $request->commentary,
                        'history' => $minor_box->history.' '.$history
                    ]);
                }else {
                    $minor_box = MinorBoxUser::Create(
                        [
                            'user_id' => $id->user_id,
                            'responsable_id' => auth()->id(),
                            'charges' => 0,
                            'discharges' => $id->value,
                            'last_date' => now(),
                            'pending' => 0,
                            'status' =>  1,
                            'commentary' => $request->commentary,
                            'history' => now()->format('d/m/Y H:i:s').': SCC descargo $'.$id->value.' y se le debe un total de '.$id->value.' Por: '.auth()->user()->name.' Comentario:'.$request->commentary." \n",
                        ]
                    );
                }
            }
            // correo
            Mail::send('human_management.chargeaccount.email.main', ['data' => $id], function ($menssage) use ($id)
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
                if ($id->user_id) {
                    $menssage->to($id->user->email,$id->user->name)->subject("Energitelco S.A.S CUENTA DE COBRO APROBADA ".$id->id);
                }
            });
            return redirect()->back()->with(['success'=>'Se ha aprobado la cuenta de cobro correctamente']);
        }else {
            $id->update([
                'status' => 2,
                'approve_id' => auth()->id()
            ]);
            return redirect()->back()->with(['success'=>'Se ha desaprobado la cuenta de cobro correctamente']);
        }
    }
}
