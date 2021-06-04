<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Work1;
use App\Models\Work2;
use App\Models\Work3;
use App\Models\Work4;
use App\Models\Work5;
use App\Models\Work6;
use App\Models\Work7;
use App\Models\interview;
use App\Models\billboard\billboard_type;
use App\Models\bonus24;
use App\Models\project\planing\Project;
use App\Models\Customer;
use App\Models\Provider;
use App\Models\SuggestionsMailbox;
use App\Models\SystemMessages;
use App\Models\Work8;
use App\Models\WorkWithUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios = User::with('roles')->where('state',1)->count();
        $aprobar1 = Work1::where('estado','Sin aprobar')->count();
        $aprobar2 = Work2::where('estado','Sin aprobar')->count();
        $aprobar3 = Work3::where('estado','Sin aprobar')->count();
        $aprobar4 = Work4::where('estado','Sin aprobar')->count();
        $aprobar5 = Work5::where('estado','Sin aprobar')->count();
        $aprobar6 = Work6::where('estado','Sin aprobar')->count();
        $aprobar7 = Work7::where('estado','Sin aprobar')->count();
        $trabajos1 = Work1::where('estado','!=','Sin aprobar')->where('estado','!=','No aprobado')->count();
        $sin_aprovar1 = Work1::where('estado','Sin aprobar')->where('coordinador',auth()->id())->count();
        $proyectos = Project::count();
        session(['notificaiones_aprobacion'=>$sin_aprovar1]);
        $total_sin_aprobar = $aprobar1+$aprobar2+$aprobar3+$aprobar4+$aprobar5+$aprobar6+$aprobar7;
        if(auth()->user()->hasRole('Administrador')){
            session(['notificaiones_aprobacion'=>$total_sin_aprobar]);
        }
        // $bill_types = billboard_type::with(['documents' => function ($query)
        // {
        //     $query->select('id','name_document','document')->where('estado','Disponible');
        // }])->where('status',1)->orderBy('id','DESC')->get();
        $bill_types = billboard_type::with(['documents' => function ($query)
        {
            $query->where('estado','=','Disponible');
        }])->orderBy('id','DESC')->get(['id','name']);
        
        $start_mesage = SystemMessages::where('state',1)->where('name','Pagina de inicio')->first();
        $customers = Customer::where('state',1)->count();
        $providers = Provider::where('state',1)->count();
        $interviews = interview::count();
        $job_application = WorkWithUs::count();
        $proof_payment = Work8::where('estado','Aprobado')->get()->last();
        return view('home',compact('usuarios','total_sin_aprobar','trabajos1','bill_types','start_mesage','proyectos','customers','providers','job_application','interviews','proof_payment'));
    }

    public function notification()
    {
        $notifications = auth()->user()->notifications;
        return view('notification.index',compact('notifications'));
    }

    public function about()
    {
        return view('about');
    }

    public function notification_read($id)
    {
        foreach (auth()->user()->unreadNotifications as $notification) {
            if ($notification->id == $id){
                $notification->markAsRead();
            }
        }
    }

    public function notification_all_read()
    {
        auth()->user()->notifications->markAsRead();
        return redirect()->route('notifications')->with('success','Se marcaron las notificaciones como leídas');
    }
    
    public function notification_delete()
    {
        auth()->user()->readNotifications()->delete();
        return redirect()->route('notifications')->with('success','Se eliminaron todas las notificaciones leídas');
    }


    public function suggestions_mailbox(Request $request)
    {
        $request->validate([
            'type' => ['required'],
            'area' => ['required'],
            'affair' => ['required'],
            'description' => ['required'],
        ]);
        $request['status'] = 0;
        $request['user_id'] = auth()->id();
        SuggestionsMailbox::create($request->all());

        Mail::send('emails.suggestion',['data' => $request] , function ($mail) use ($request) {
            $mail->subject("ENERGITELCO S.A.S. PQRSF: ".$request->affair.' por '.auth()->user()->name);  
            $mail->to('jorge.ortega@energitelco.com.co', 'JORGE ANDRES ORTEGA BEDOYA');
        });

        return redirect()->route('home')->with('success','Se ha enviado el PQRSF correctamente');
    }

    public function working_letter()
    {
        $meses = array('',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $day = date('d', strtotime(auth()->user()->register->date));
        $month = date('n', strtotime(auth()->user()->register->date));
        $year = date('Y', strtotime(auth()->user()->register->date));
        $date_start = ['day' => $day,'month' => $meses[intval($month)],'year' => $year];
        $date = ['day' => now()->format('d'),'month' => $meses[intval(now()->format('m'))],'year' => now()->format('Y')];

        $salary_text = $this->numberToText(auth()->user()->register->hasContract()->salary);
        $pdf = PDF::loadView('pdf.working',compact('date','salary_text','date_start'));
        return $pdf->download('carta_laboral.pdf');
    }

    public function bonus_24_7(Request $request)
    {
        $request->validate([
            'description' => ['required'],
        ]);
        $request['status'] = 0;
        $request['user_id'] = auth()->id();
        bonus24::create($request->all());

        return redirect()->route('home')->with('success','Se ha enviado el reporte correctamente');
    }
}
