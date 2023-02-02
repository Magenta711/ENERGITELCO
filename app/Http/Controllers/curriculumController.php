<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Notifications\notificationMain;
use App\Models\curriculum;
use App\Models\Positions;
use App\Models\system_setting;
use App\Models\general_setting;
use App\Models\document;
use App\Models\project\planing\makeupsRf;
use App\Models\Register;
use App\Models\Responsable;
use App\User;
use Spatie\Permission\Models\Role;
use App\Models\signature;
use Carbon\Carbon;

class curriculumController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Lista de hojas de vida|Crear hojas de vida|Ver hojas de vida|Aprobar hojas de vida|Editar hojas de vida|Eliminar hojas de vida',['only' => ['index']]);
        $this->middleware('permission:Crear hojas de vida',['only' => ['create','store']]);
        $this->middleware('permission:Ver hojas de vida',['only' => ['show']]);
        $this->middleware('permission:Aprobar hojas de vida',['only' => ['approve','not_approve']]);
        $this->middleware('permission:Editar hojas de vida',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar hojas de vida',['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculums = curriculum::with([
            'responsable',
            'register'=>function ($query)
            {
                $query->with(['user',
                'contracts' => function ($query)
                {
                    $query->where('status',1);
                }
            ]);
            
        }])->get();
        $numDocument = document::where('status','!=',3)->where('contract',1)->count();
        return view('curriculum.index',compact('curriculums','numDocument'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registers = Register::where('state',1)->get();
        $users = User::where('state',1)->get();
        $positions = Positions::where('state',1)->get();
        
        return view('curriculum.create',compact('registers','positions','users'));
    }
    
    public function create2(curriculum $id)
    {
        if($id->state == 'En creacción'){
            return view('curriculum.create2',compact('id'));
        }else {
            return redirect()->route('curriculum_edit',$id->id);
        }
    }

    public function create3(curriculum $id)
    {
        if($id->state == 'En creacción'){
            $positions = Positions::where('state',1)->get();
            return view('curriculum.create3',compact('id','positions'));
        }else {
            return redirect()->route('curriculum_edit',$id->id);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'register_id' => ['required'],
        ]);

        $id = $request->register_id;
        
        if ($request->register_id == 0) {
            $request->validate([
                'name' => ['required'],
                'email' => ['required','unique:registers,email'],
                'document' => ['required','unique:registers,document'],
                'address' => ['required'],
                'age' => ['required'],
                'marital_status' => ['required'],
                'position_id' => ['required'],
            ]);
            $register = Register::where('document',$request->document)->first();
            if (!$register) {
                $register = Register::create($request->all());
            }
            $request['register_id'] = $register->id;
            if ($request->user_id !== 0) {
                $user = User::find($request->user_id);
                if($user){
                    $user->update(['register_id' => $register->id]);
                }
            }
            $id = $register->id;
        }else {
            $register = Register::find($id);
            $register->update(['state'=>1]);
            if ($register->user) {
                $register->user->update([ 'state' => 1 ]);
            }
        }

        $curriculum = curriculum::create($request->all());

        $curriculum->update(['responsable_id' => auth()->id(),'register_id' => $id]);

        return redirect()->route('curriculum_create2',$curriculum->id);
    }

    public function store2(Request $request,curriculum $id)
    {
        return redirect()->route('curriculum_create3',$id->id);
    }
    
    public function store3(Request $request,curriculum $id)
    {
        $request->validate([
            'has_limitation' => ['required'],
            'has_familiary' => ['required'],
        ]);

        $id->update([
            'has_familiary' => $request->has_familiary,
            'name_r' => $request->name_r,
            'parent' => $request->parent,
            'position_id_r' => $request->position_id_r,
            'has_limitation' => $request->has_limitation,
            'state' => 'Sin aprobar'
        ]);

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar hojas de vida')){
                $user->notify(new notificationMain($id->id,'Nuevo hoja de vida '.$id->id,'curriculum/show/'));
            }
        }
        $documents = document::where('status',1)->where('contract',1)->get();
        //Mail curriculum
        Mail::send('emails.curriculum', ['id'=>$id,'documents' => $documents], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) {
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->responsable->email,$id->responsable->name)->subject("Energitelco S.A.S, Nueva hoja de vida sin aprobar.");
        });

        return redirect()->route('curriculums')->with('success','Se ha guardado la hoja de vida correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(curriculum $id)
    {
        $documents = document::where('status','!=',3)->where('contract',1)->get();
        return view('curriculum.show',compact('id','documents'));
    }
    
    public function register(Register $id)
    {
        $id->update(['state'=>1]);
        $roles = Role::get();
        $positions = Positions::where('state',1)->orderBy('name')->get();
        return view('curriculum.register',compact('id','roles','positions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(curriculum $id)
    {
        if($id->state != 'En creacción'){
            $documents = document::where('status','!=',3)->where('contract',1)->get();
            $positions = Positions::where('state',1)->get();
            return view('curriculum.edit',compact('id','positions','documents'));
        }else {
            return redirect()->route('curriculum_create2',$id->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,curriculum $id)
    {
        $request->validate([
            'has_limitation' => ['required'],
            'has_familiary' => ['required'],
        ]);

        $id->register->update($request->all());
        $id->update($request->all());

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img/interview/',$name);
            $id->register->update(['photo' => $name]);
        }
        
        $state = ($id->state == 'Sin aprobar' || $id->state == 'Envio de documentos' || $id->state == 'Documentos enviados') ? 'Sin aprobar' : (($id->files()->count() >= 18) ? 'Completo' : 'Pendiente');
        

        $id->update([
            'state' =>  $state,
        ]);

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar hojas de vida')){
                $user->notify(new notificationMain($id->id,'La hoja de vida de '.$id->register->name.' fue editada ','curriculum/show/'));
            }
        }

        return redirect()->route('curriculums')->with('success','Se ha actualizado la hoja de vida correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(curriculum $id)
    {
        $id->delete();
        return redirect()->route('curriculums')->with('success','Se ha eliminado la hoja de vida correctamente');
    }

    public function approve(curriculum $id)
    {
        $state = ($id->files()->count() >= 18) ? 'Completo' : 'Pendiente';

        $id->update(['state'=>$state,'approver_id'=>auth()->id()]);
        $id->register->contractApprove();

        $id->responsable->notify(new notificationMain($id->id,'Se aprobo la hoja de vida '.$id->id,'curriculum/show/'));

        return redirect()->back()->with(['success'=>'Se ha aprobado la hoja de vida correctamente']);
    }
    
    public function not_approve(curriculum $id)
    {
        $id->update(['state'=>'No aprobado','approver_id'=>auth()->id()]);
        
        $id->responsable->notify(new notificationMain($id->id,'No se aprobo la hoja de vida '.$id->id,'curriculum/show/'));

        return redirect()->back()->with(['success'=>'Se ha desaprobado la hoja de vida correctamente']);
    }

    public function upload_file(Request $request)
    {
        if ($request->hasFile('file')){
            $curriculum = curriculum::find($request->id);
            $file_exists = $curriculum->files->where('description',$request->name_d)->first();
            if ($file_exists){
                Storage::delete('public/upload/curriculim/'.$file_exists->name);
            }
            $file = $request->file('file');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('public/upload/curriculim', $file, $name);
            if ($file_exists) {
                $file_exists->update([
                    'name' => $name,
                    'description' => $request->name_d,
                    'commentary' => $request->commentary,
                    'size' => $size.' KB',
                    'url' => $path,
                    'type' => $file->getClientOriginalExtension(),
                    'state' => 1
                ]);
                return response()->json([
                    'success'=>'Se subio y actualizo correctamente el archivo',
                    'size' => $size.' KB',
                    'name' => $name,
                    'type' => $file->getClientOriginalExtension(),
                ]);
            }
            $curriculum->files()->create([
                'name' => $name,
                'description' => $request->name_d,
                'commentary' => $request->commentary,
                'size' => $size.' KB',
                'url' => $path,
                'type' => $file->getClientOriginalExtension(),
                'state' => 1
            ]);
            return response()->json([
                'success'=>'Se subio correctamente el archivo',
                'size' => $size.' KB',
                'name' => $name,
                'type' => $file->getClientOriginalExtension(),
            ]);
        }else {
            return response()->json(['success'=>'No se examino un archivo']);
        }
    }

    public function attach($token)
    {
        $id = curriculum::where('token',$token)->first();
        if($id){
            return view('curriculum.attach_documents',compact('token','id'));
        }
        return redirect()->route('curriculum_attach_success')->with('title','Ya enviaste la información.')->with('success','Una ves enviada la informacion no tienes acceso a este link. Si consideras que se trata de un error, intenta comunicarte con Energitelco S.A.S')->with('slogan','Nuestro mejor premio es la satisfación de nuestros clientes.');
    }

    public function attach_store(Request $request)
    {
        $id = curriculum::where('token',$request->token)->first();
        if ($id) {
            if ($request->buttom == 'Guardar') {
                $state = 'Envio de documentos';
                $token = $request->token;
                $attached_at = null;
                $success = 'Se ha guardado la información correctamente, favor enviar lo antes posible';
            }else {
                $token = null;
                $state = 'Documentos enviados';
                $attached_at = now();
                $success = 'Se ha enviado la información correctamente';

                $users = User::where('state',1)->get();

                foreach ($users as $user) {
                    if ($user->hasPermissionTo('Aprobar hojas de vida')){
                        $user->notify(new notificationMain($id->id,'Documetos enviados '.$id->id,'curriculum/show/'));
                    }
                }
            }
    
            $id->register->update($request->all());
    
            $id->update([
                'state' => $state,
                'token' => $token,
                'attached_at' => $attached_at,
            ]);
            return redirect()->route('curriculum_attach_success')->with('title','Exito.')->with('success',$success)->with('slogan','Nuestro mejor premio es la satisfación de nuestros clientes.');
        }
        return redirect()->route('curriculum_attach_success')->with('title','Acceso denegado.')->with('success','Una ves enviada la informacion no tienes acceso a este link. Si consideras que se trata de un error, intenta comunicarte con Energitelco S.A.S')->with('slogan','Nuestro mejor premio es la satisfación de nuestros clientes.');
    }

    public function success()
    {
        return view('curriculum.success');
    }

    public function signature_1()
    {
        $id = auth()->user()->register->curriculum;
        $documents = document::where('status','!=',3)->where('contract',1)->get();
        return view('curriculum.signature',compact('id','documents'));
    }

    public function signature(Request $request)
    {
        signature::create([
            'signatures_type' => 'App\Models\document',
            'signatures_id' => $request->id,
            'user_id' => auth()->id(),
        ]);
        return response()->json(['success'=>'Se firmó']);
    }
    public function signature_contract(Request $request)
    {
        Contract::where('id',$request->contract_id)->update([
            'signatured_at' => now(),
        ]);
        
        if (auth()->user()->register->hasContract()->isAuto) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $day = date('d', strtotime(auth()->user()->register->hasContract()->start_date));
            $month = date('n', strtotime(auth()->user()->register->hasContract()->start_date));
            $year = date('Y', strtotime(auth()->user()->register->hasContract()->start_date));
    
            // Convertir fecha
            $date = ['day' => $day,'month' => $meses[($month -1)],'year' => $year];
    
            $date = ['day' => $day,'month' => $meses[($month -1)],'year' => $year];
            $pdf = PDF::loadView('documents/contract_signature',['data'=>auth()->user()->register->hasContract(),'id' => auth()->user()->register, 'date' => $date]);
            $pdf->save(storage_path('app/public/contratos/') .auth()->user()->register->hasContract()->file->name);
        }
        
        return response()->json(['success'=>'Se firmó']);
    }

    public function renovation_contract(Request $request,Register $id)
    {
        foreach ($id->contracts as $value) {
            if (($value->renovation == 1 || $value->renovation == 2) && $value->status == 1) {
                $new_date = Carbon::create($value->end_date)->addMonths($request->months);
                Contract::find($value->id)->update([
                    'end_date'=>$new_date,
                    'months' => $request->months,
                    'salary' => $request->salary,
                    'type_contract' => $request->type_contract,
                    'renovation' => $value->renovation++,
                    'status' => 1
                ]);
            }else {
                Contract::find($value->id)->update([
                    'end_date'=>null,
                    'months' => null,
                    'salary' => $request->salary,
                    'type_contract' => 'Indefinido',
                    'renovation' => $value->renovation++,
                    'status' => 1
                ]);
            }
        }
        return redirect()->route('curriculums')->with('success','Se ha renovado el contrato de '.$id->name.' correctamente');
    }
}
