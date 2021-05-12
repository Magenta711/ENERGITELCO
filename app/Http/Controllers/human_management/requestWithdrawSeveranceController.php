<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\SystemMessages;
use App\Models\Work10;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Session;

class requestWithdrawSeveranceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Aprobar retiro de cesantías|Digitar solicitud de retiro de cesantías|Eliminar solicitud de retiro de cesantías',['only' => ['index']]);
        $this->middleware('permission:Consultar retiro de cesantías',['only' => ['show']]);
        $this->middleware('permission:Descargar PDF de permisos de trabajo',['only' => ['download']]);
        $this->middleware('permission:Digitar solicitud de retiro de cesantías',['only' => ['create','store']]);
        $this->middleware('permission:Eliminar solicitud de retiro de cesantías',['only' => ['destroy']]);
        $this->middleware('permission:Aprobar retiro de cesantías',['only' => ['approve']]);
        $this->message = SystemMessages::where('state',1)->where('name','Envio de formatos')->first();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $withdraw_serveraces = Work10::with(['responsableAcargo','coordinadorAcargo'])->get();
        return view('human_management.withdraw_serveraces.index',compact('withdraw_serveraces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('state',1)->get();
        $message = $this->message;
        return view('human_management.withdraw_serveraces.create',compact('usuarios','message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reason' => ['required'],
            'description' => ['required'],
        ]);
        
        $request['responsable_id'] = auth()->id();
        $request['estado'] = 'Sin aprobar';
        $id = Work10::create($request->all());
        
        if($request->hasFile('file')){
            for ($i=0; $i < count($request->file('file')); $i++) { 
                $file = $request->file('file')[$i];
                $name = time().str_random().'.'.$file->getClientOriginalExtension();
                $size = $file->getClientSize() / 1000;
                $path = Storage::putFileAs('public/files/work_10', $file, $name);
                $id->files()->create([
                    'name' => $name,
                    'description' => 'Retiro de cesantías '.auth()->id(),
                    'size' => $size.' KB',
                    'url' => $path,
                    'type' => $file->getClientOriginalExtension(),
                    'state' => 1
                ]);
            }
        }

        $users = User::where('state')->get();
        foreach ($users as $user) {
            if ($user->hasPermission('Aprobar retiro de cesantías')) {
                $user->notify(new notificationMain($id->id,'Solicitud de carta de retiro de cesantías o laboral '.$id->id,'human_management/request_withdraw_severance/show/'));
            }
        }

        Mail::send('human_management.withdraw_serveraces.mail.main', ['format' => $id], function ($menssage) use ($id)
        {
            $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) {
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->subject("Energitelco S.A.S. Solicitud de carta de retiro de cesantías o laboral ".$id->id);
        });
        
        return redirect()->route('request_withdraw_severance')->with('success','Se ha enviado el formulario correctamente para su aprobación por parte de un coordinador.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Work10::with(['files','coordinadorAcargo' => function ($query)
        {
            $query->with('roles');
        },'responsableAcargo' => function ($query)
        {
            $query->with('roles');
        }])->find($id);
        $meses = array('0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $day = 0;
        $month = 0;
        $year = 0;
        if ($id->responsableAcargo->register) {
            $day = date('d', strtotime($id->responsableAcargo->register->date));
            $month = date('n', strtotime($id->responsableAcargo->register->date));
            $year = date('Y', strtotime($id->responsableAcargo->register->date));
        }
        // Convertir fecha
        $date = ['day' => $day,'month' => $meses[($month)],'year' => $year, 'this_month' => $meses[intval(now()->format('m'))]];
        return view('human_management.withdraw_serveraces.show',compact('id','date'));
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
    public function destroy(Work10 $id)
    {
        $id->delete();
        return redirect()->route('request_withdraw_severance')->with('success','Se ha eliminado el formato correctamente');
    }

    /**
     * Aprove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Work10 $id)
    {
        if ($request->status == 'Aprobado') {
            $id->update([
                'estado'=>"Aprobado",
                'commentary'=>$request->commentary,
                'value'=>$request->layoffs,
                'letter'=>$request->letter4,
                'coordinator_id' => auth()->id(),
            ]);
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $day = now()->format('d');
            $month = now()->format('m');
            $year = now()->format('Y');
            $time = time();
            $date = ['day' => $day,'month' => $meses[($month -1)],'year' => $year];
            if ($id->reason == 'carta laboral') {
                $salary_text = $this->numberToText($request->layoffs);
                $document = $time.'_CARTA_CARTA_LABORAL.pdf';
                $pdf4 = PDF::loadView('pdf.working',compact('request','date','id','salary_text','document'));
                $pdf4->save(storage_path('app/public/files/layoffs/') .$time.'_CARTA_CARTA_LABORAL.pdf');
            }else {
                $id->responsableAcargo->notify(new notificationMain($id->id,'Se ha aprobado el retiro de cesantías '.$id->id,'human_management/request_withdraw_severance/show/'));
                $document = $time.'_CARTA_RETIRO_CESANTÍAS.pdf';
                $pdf4 = PDF::loadView('end_work/pdf/letter_4',['data'=>$request,'id' => $id,'date' => $date,'document' => $document]);
                $pdf4->save(storage_path('app/public/files/layoffs/') .$time.'_CARTA_RETIRO_CESANTÍAS.pdf');
            }
            // Crear carta y almacenarla
            $file = $id->responsableAcargo->register->letters()->create([
                'responsable_id' => auth()->id(),
                'type' => $id->reason == 'carta laboral' ? 'CARTA_LABORAL' : 'CARTA_RETIRO_CESANTÍAS',
                'data' => $request->layoffs.' -,- '.$request->letter4,
                'date' => now(),
                'status' => 1,
            ]);
            $file->file()->create([
                'name' => $id->reason == 'carta laboral' ? $time.'_CARTA_CARTA_LABORAL.pdf' : $time.'_CARTA_RETIRO_CESANTÍAS.pdf',
                'description' => 'Carta laboral de '.$id->responsableAcargo->name,
                'size' => '44 KB',
                'url' => 'public/files/layoffs/'.$time.'_CARTA_CARTA_LABORAL.pdf',
                'type' => 'pdf',
                'state' => 1
            ]);

            $id->files()->create([
                'name' => $id->reason == 'carta laboral' ? $time.'_CARTA_CARTA_LABORAL.pdf' : $time.'_CARTA_RETIRO_CESANTÍAS.pdf',
                'description' => 'Carta laboral de '.$id->responsableAcargo->name,
                'size' => '44 KB',
                'url' => 'public/files/layoffs/'.$time.'_CARTA_CARTA_LABORAL.pdf',
                'type' => 'pdf',
                'state' => 1
            ]);
            
            Mail::send('human_management.withdraw_serveraces.mail.main', ['format' => $id], function ($menssage) use ($id,$pdf4,$time)
            {
                $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsableAcargo->email,$id->responsableAcargo->name)->subject("Energitelco S.A.S. Solicitud de carta de retiro de cesantías o laboral aprobado ".$id->id);
                $menssage->attachData($pdf4->output(), $time.'_CARTA_RETIRO_CESANTÍAS.pdf');
            });

            return redirect()->route('approval')->with(['success'=>'Se ha aprobado la solicitud de carta de retiro de cesantías o laboral '.$id->id.' correctamente','sudmenu' => 9]);
        }else {
            $id->update([
                'estado' => "No aprobado",
                'commentary'=>$request->commentary,
                'coordinator_id' => auth()->id(),
            ]);

            $id->responsableAcargo->notify(new notificationMain($id->id,'No se aprobó la solicitud de carta de retiro de cesantías o laboral '.$id->id,'human_management/request_withdraw_severance/show/'));

            return redirect()->route('approval')->with(['success'=>'Se ha desaprobado la solicitud de carta de retiro de cesantías o laboral correctamente','sudmenu'=>9]);
        }
    }

    public function numberToText(int $num)
    {
        $unidades = ['','uno','dos','tres','cuatro','cinco','seis','siete','ocho','nueve'];
        $especiales = ['','once','doce','trece','catorce','quince','diezciseis','diecisiete','dieciocho','diecinueve'];
        $decenas = ['','diez','veinte','treinta','cuarenta','cincuenta','sesenta','setenta','ochenta','noventa'];
        $centenas = ['','cien','doscientos','trescientos','cuatrocientos','quinientos','seiscientos','setecientos','ochocientos','novecientos'];
        $unidadesMillon = ['','un millón', 'dos millones', 'tres millones', 'cuatro millones', 'cinco millones', 'seis millones', 'siete millones', 'ocho millones', 'nueve millones'];

        $number = str_split($num);
        $text = '';

        $by = strlen($num);

        if ($by == 7) {
            if ($number[0]) {
                $text = $text.$unidadesMillon[$number[0]].' ';
            }
            $by--;
            array_splice($number, 0, 1);
        }
        if ($by == 6) {
            if ($number[0]) {
                $text = $text.$centenas[$number[0]].' ';
            }
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 5) {
            if ($number[0]) {
                $de = $decenas[$number[0]].' ';
                if ($number[0] == 1) {
                    if ($number[1] != 0) {
                        $de = $especiales[$number[1]].' mil ';
                        array_splice($number, 0, 1);
                        $by--;
                    }
                }
                $text = $text.$de;
            }
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 4) {
            if ($number[0]) {
                $text = $text.$unidades[$number[0]].' mil ';
            }
            $text = $text;
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 3) {
            if ($number[0]) {
                $text = $text.$centenas[$number[0]].' ';
            }
            $text = $text;
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 2) {
            if ($number[0]) {
                $de = $decenas[$number[0]].' ';
                if ($number[0] == 1) {
                    if ($number[1] != 0) {
                        $de = $especiales[$number[1]].' ';
                        array_splice($number, 0, 1);
                        $by--;
                    }
                }
                $text = $text.$de;
            }
            $text = $text.' ';
            array_splice($number, 0, 1);
            $by--;
        }
        if ($by == 1) {
            if ($number[0]) {
                $text = $text.$unidades[$number[0]].' ';
            }
            $text = $text;
            array_splice($number, 0, 1);
            $by--;
        }

        return $text;
    }
}
