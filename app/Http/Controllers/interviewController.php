<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Positions;
use App\Models\interview;
use App\Models\system_setting;
use App\Models\Register;
use App\Models\curriculum;
use App\Models\general_setting;
use App\Models\interview_references;
use App\Models\document;
use App\Models\file;
use App\Models\WorkWithUs;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Notifications\notificationMain;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class interviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de entrevista|Crear entrevistas|Ver entrevistas|Aprobar entrevistas|Editar entrevistas|Eliminar entrevistas|Enviar documentos de contratación',['only' => ['index']]);
        $this->middleware('permission:Crear entrevistas',['only' => ['create','store']]);
        $this->middleware('permission:Ver entrevistas',['only' => ['show']]);
        $this->middleware('permission:Aprobar entrevistas',['only' => ['approve','not_approve']]);
        $this->middleware('permission:Editar entrevistas',['only' => ['edit','update']]);
        $this->middleware('permission:Eliminar entrevistas',['only' => ['destroy']]);
        $this->middleware('permission:Enviar documentos de contratación',['only' => ['send_documentation','presend_documentation']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = interview::with('register','responsable')->get();
        return view('interview.index',compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::where('state',1)->get();
        return view('interview.create',compact('positions'));
    }
    public function create_application(WorkWithUs $id)
    {
        $positions = Positions::where('state',1)->get();
        return view('interview.create',compact('id','positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        //Validate
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'document' => ['required','unique:registers,document'],
            'address' => ['required'],
            'age' => ['required'],
            'marital_status' => ['required'],
            'position_id' => ['required'],
            'observations' => ['required'],
        ]);
        
        //save
        $interview = interview::create($request->all());

        $register = Register::where('document',$request->document)->first();
        if (!$register) {
            $register = Register::create($request->all());
        }
        
        $interview->update(['responsable_id' => auth()->id(),'register_id' => $register->id]);
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img/interview/',$name);
            $register->update(['photo' => $name]);
        }
        
        for ($i=0; $i < 2; $i++) { 
            interview_references::create([
                'interview_id' => $interview->id,
                'company_r' => $request->company_r[$i],
                'date_r' => $request->date_r[$i],
                'name_r' => $request->name_r[$i],
                'service_time_r' => $request->service_time_r[$i],
                'concept_r' => $request->concept_r[$i],
                'recommend' => $request->recommend[$i]
            ]);
        }

        //Notification
        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Aprobar entrevistas')){
                $user->notify(new notificationMain($interview->id,'Nueva entrevista '.$interview->id,'human_management/interview/show/'));
            }
        }
        
        //Mail
        Mail::send('emails.interview', ['id' => $interview], function ($menssage) use ($interview)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($interview->responsable->email,$interview->responsable->name)->subject("Energitelco S.A.S. Nueva entrevista sin aprobar");
        });

        return redirect()->route('interview')->with('success','Se ha creado la entrevista correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(interview $id)
    {
        return view('interview.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(interview $id)
    {
        $positions = Positions::where('state',1)->get();
        return view('interview.edit',compact('id','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,interview $id)
    {
        //Validate
        $request->validate([
            'name' => ['required'],
            'document' => ['required'],
            'address' => ['required'],
            'age' => ['required'],
            'marital_status' => ['required'],
            'position_aspires_id' => ['required'],
            'position_aspires_id' => ['required'],
            'observations' => ['required'],
        ]);
        
        //save
        $id->update($request->all());
        $id->register->update($request->all());
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/img/interview/',$name);
            $id->register()->update(['photo' => $name]);
        }
        $i = 0;
        foreach ($id->references as $references) {
            $references->update([
                'interview_id' => $id->id,
                'company_r' => $request->company_r[$i],
                'date_r' => $request->date_r[$i],
                'name_r' => $request->name_r[$i],
                'service_time_r' => $request->service_time_r[$i],
                'concept_r' => $request->concept_r[$i],
                'recommend' => $request->recommend[$i]
            ]);
            $i++;
        }

        //Notification
        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Editar entrevistas')){
                $user->notify(new notificationMain($id->id,'Entrevista editada '.$id->id,'human_management/interview/show/'));
            }
        }
        
        //Mail
        Mail::send('emails.interview', ['id' => $id], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) { 
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->responsable->email,$id->responsable->name)->subject("Energitelco S.A.S. Entrevista editada");
        });

        return redirect()->route('interview')->with('success','Se ha actualizado la entrevista correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(interview $id)
    {
        $id->delete();
        return redirect()->route('interview')->with('success','Se ha eliminado la entrevista correctamente');
    }

    public function approve(interview $id)
    {
        $id->update(['state' => 1,'approver_id'=>auth()->id()]);

        $id->responsable->notify(new notificationMain($id->id,'Se ha aprobado la entrevista '.$id->id,'human_management/interview/show/'));

        return redirect()->back()->with(['success'=>'Se ha aprobado la entrevista correctamente.']);
    }
    
    public function not_approve(interview $id)
    {
        $id->update(['state' => 2,'approver_id'=>auth()->id()]);

        $id->responsable->notify(new notificationMain($id->id,'Se ha desaprobado la entrevista '.$id->id,'human_management/interview/show/'));

        return redirect()->back()->with(['success'=>'Se ha desaprobado la entrevista correctamente.']);
    }

    public function presend_documentation(interview $id)
    {
        if ($id->state == 1){
            $positions = Positions::where('state',1)->get();
            return view('interview.presend_documentation',compact('id','positions'));
        }
        return redirect()->route('interview')->with('success','No tienes acceso a esta página.');
    }

    public function send_documentation(Request $request, interview $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'document' => ['required'],
            'address' => ['required'],
            'age' => ['required'],
            'marital_status' => ['required'],
            'place_residence' => ['required'],
            'neighborhood' => ['required'],
            'date_birth' => ['required'],
            'date' => ['required'],
            'day_breack' => ['required'],
            'type_contract' => ['required'],
            'salary' => ['required'],
        ]);
        $token = Str::random(20);
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $day = date('d', strtotime($request->date));
        $month = date('n', strtotime($request->date));
        $year = date('Y', strtotime($request->date));

        $time = time();
        // Convertir fecha
        $date = ['day' => $day,'month' => $meses[($month -1)],'year' => $year];
        
        $pdf = PDF::loadView('documents/contract',['data'=>$request,'id' => $id->register, 'date' => $date]);
        $pdf->save(storage_path('app/public/contratos/') .$time.'contrato.pdf');

        $id->update(['state' => 3]);

        $end_date = null;
        if ($request->months) {
            $end_date = Carbon::create($request->date)->addMonths($request->months);
        }


        $id->register->update($request->all());
        $id->register->update(['state'=>1]);
        $contract = Contract::create([
            'register_id' => $id->register->id,
            'type_contract' => $request->type_contract,
            'start_date' => $request->date,
            'end_date' => $end_date,
            'day_breack' => $request->day_breack,
            'months' => $request->months,
            'salary' => $request->salary,
            'isAuto' => 1,
            'renovation' => 1,
            'status' => 2,
        ]);

        $contract->file()->create([
            'name' => $time.'contrato.pdf',
            'description' => 'Contrato '.$id->register->name,
            'size' => '103 KB',
            'type' => 'pdf',
            'url' => 'public/contratos',
            'state' => 1,
        ]);

        $documents = document::where('status',1)->where('contract',1)->get();

        $curriculim = curriculum::create([
            'responsable_id' => auth()->id(),
            'register_id' => $id->register->id,
            'state' => 'Envio de documentos',
            'responsable_id' => auth()->id(),
            'token' => $token,
        ]);
        
        Mail::send('emails/send_contract',['token' => $token, 'user' => $id->register] , function ($mail) use ($pdf,$documents,$id) {
            $mail->subject("Energitelco S.A.S. Envió de contrato y anexos");
            $mail->to($id->register->email, $id->register->name);
            $mail->attachData($pdf->output(), 'contrato.pdf');
            // Traer datos de la base de datos
            foreach ($documents as $value) {
                $mail->attach( storage_path('app/private/documents/').$value->file->name);
            }
        });

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Enviar documentos de contratación')){
                $user->notify(new notificationMain($curriculim->id,'Se envio documetos para la nueva hoja de vida '.$curriculim->id,'curriculum/show/'));
            }
        }

        return redirect()->route('interview')->with('success','Se ha enviado la documentación correctamente.');
    }
}
