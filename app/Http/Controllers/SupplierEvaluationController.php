<?php

namespace App\Http\Controllers;

use App\Models\file;
use App\Models\Provider;
use App\Models\SupplierEvaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Storage;

class SupplierEvaluationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Lista de evaluaciones de proveedores|Calificar evaluaciones de proveedores|Ver evaluaciones de proveedores',['only' => ['index']]);
        $this->middleware('permission:Ver evaluaciones de proveedores',['only' => ['show']]);
        $this->middleware('permission:Calificar evaluaciones de proveedores',['only' => ['update','responde']]);
        $this->middleware('permission:Disparar evaluación a proveedores',['only' => ['create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = SupplierEvaluation::with(['provider','responsable'])->get();
        return view('supplier_evaluation.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::where('state',1)->get();

        foreach ($providers as $provider) {
            $token = Str::random(60);
            SupplierEvaluation::create([
                'user_id' => auth()->id(),
                'provider_id' => $provider->id,
                'token' => $token,
                'state' => 1
            ]);
            
            //mail Consolidar si se necesita con copia a energitelco
            Mail::send('emails.supplier_evaluation', ['token' => $token, 'id' => $provider->id], function ($menssage) use ($provider)
            {
                $menssage->to($provider->email,$provider->name)->subject("Energitelco S.A.S. evaluación de proveedor.");
            });
        }
        $users = User::where('state',1)->get();
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Lista de evaluaciones de proveedores')) {
                $user->notify(new notificationMain('','Nueva evaluación de proveedpres','supplier_evaluation'));
            }
        }
        return redirect()->route('supplier_evaluation')->with('success','Se ha enviado la evaluación a proveedores correctamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $token)
    {
        $id = SupplierEvaluation::where('token',$token)->where('state',1)->first();
        if($id){
            $request->validate([
                'provider_type' => ['required'],
                'product' => ['required'],
                'date' => ['required'],
                'period' => ['required'],
            ]);

            if ($request->hasFile('file')) {
                for ($i=1; $i <= count($request->file('file')); $i++) {
                    if ($request->file('file')[$i]) {
                        $str = Str::random(5);
                        $file = $request->file('file')[$i];
                        $name = time().$str.'.'.$file->getClientOriginalExtension();
                        $size = $file->getClientSize() / 1000;
                        $path = Storage::putFileAs('private/upload/provider', $file, $name);
                        $id->files()->create([
                            'name' => $name,
                            'description' => $request->file_name[$i],
                            'size' => $size.' KB',
                            'url' => $path,
                            'type' => $file->getClientOriginalExtension(),
                            'state' => 1
                        ]);
                    }
                }
            }

            $request['provider_type'] = $id->provider->type_provider->type;
            $request['state'] = $id->item_1_new ? 2 : 0;
            $id->update($request->all());
            $id->responsable->notify(new notificationMain($id->id,$id->provider->name.' ha contestado la evaluación de proveedores ','supplier_evaluation/responde/'));
            return redirect()->route('supplier_success')->with('title','Gracias por su colaboración.')->with('success','Su respuesta ha sido enviada para la evaluación de parte de Energitelco SAS. muchas gracias por su colaboración.');
        }
        return redirect()->route('supplier_success')->with('title','Ya respondiste')->with('success','Solo puedes llenar este formulario una vez., Gracias por su colaboración. Si consideras que se trata de un error, intenta comunicarte con Energitelco S.A.S');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierEvaluation $id)
    {
        return view('supplier_evaluation.show',compact('id'));
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
    public function update(Request $request, SupplierEvaluation $id)
    {
        if ($id->state == 0 || $id->state == 1) {
            $state = ($id->state == 1) ? 1 : 2;
            $id->update([
                'item_1_new' => $request->item_1,
                'item_2_new' => $request->item_2,
                'item_3_new' => $request->item_3,
                'item_4_new' => $request->item_4,
                'item_5_new' => $request->item_5,
                'item_6_new' => $request->item_6,
                'item_7_new' => $request->item_7,
                'item_8_new' => $request->item_8,
                'item_9_new' => $request->item_9,
                'item_10_new' => $request->item_10,
                'item_11_new' => $request->item_11,
                'comments' => $request->comments,
                'product' => $request->product ?? $id->product,
                'date' => $request->date ?? $id->date,
                'period' => $request->period ?? $id->period,
                'state' => $state,
            ]);

            if ($id->responsable->id != auth()->id()) {
                $id->responsable->notify(new notificationMain($id->id,'Evaluación del proveedor '.$id->provider->name.' calificada','supplier_evaluation/result/show/'));
            }
            
            return redirect()->route('supplier_evaluation')->with('success','Se ha calificado al proveedor correctamente');
        }

        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
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

    // Evaluacion por el proveedor
    public function edit_provider($token,$id)
    {
        $supplier = SupplierEvaluation::with('provider')->where('token',$token)->where('state',1)->first();
        if ($supplier){
            return view('supplier_evaluation.create',compact('supplier'));
        }
        return redirect()->route('supplier_success')->with('title','Ya respondiste')->with('success','Solo puedes llenar este formulario una vez., Gracias por su colaboración. Si consideras que se trata de un error, intenta comunicarte con Energitelco S.A.S');
    }

    public function success()
    {
        return view('supplier_evaluation.success');
    }

    public function responde(SupplierEvaluation $id)
    {
        if ($id->state == 0 || $id->state == 1) {
            return view('supplier_evaluation.responde',compact('id'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    public function documents_download(file $id)
    {
        return Storage::download('private/upload/provider/'.$id->name);
    }

    public function remember(SupplierEvaluation $id)
    {
        Mail::send('emails.supplier_evaluation', ['token' => $id->token, 'id' => $id->provider->id], function ($menssage) use ($id)
        {
            $menssage->to($id->provider->email,$id->provider->name)->subject("Energitelco S.A.S. evaluación de proveedor.");
        });
        return redirect()->route('supplier_evaluation')->with('success','Se ha enviado la evaluación correctamente');
    }
}
