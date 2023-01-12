<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\human_magement\Letter;
use App\Notifications\notificationMain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class endWorkController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Terminar contratación de usuarios',['only' => ['create','store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $id)
    {
        // return $id->signatures;//*
        $meses = array('',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $day = 0;
        $month = 0;
        $year = 0;
        if ($id->register && $id->register->hasContract()) {
            $day = date('d', strtotime($id->register->hasContract()->start_date));
            $month = date('n', strtotime($id->register->hasContract()->start_date));
            $year = date('Y', strtotime($id->register->hasContract()->start_date));
        }elseif ($id->register && $id->register->date){
            $day = date('d', strtotime($id->register->date));
            $month = date('n', strtotime($id->register->date));
            $year = date('Y', strtotime($id->register->date));
        }

        $yearNow = now()->format('Y');
        $monthNow = now()->format('m');
        $dayNow = now()->format('d');
        
        // Convertir fecha
        $monthDff = 0;
        if ($yearNow == $year) {
            if ($monthNow > $month) {
                $monthDff = $monthNow - $month;
            }
        }else {
            $monthNow += 12;
            $monthDff = $monthNow - $month;
        }

        if ($dayNow < $day)
        {
            $monthDff--;
        }

        $date = ['day' => $day,'month' => $meses[($month)],'year' => $year, 'this_month' => $meses[intval(now()->format('m'))]];
        
        $time = time();

        return view('end_work.create',compact('id','date','monthDff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $id)
    {
        $request->validate([
            'date' => ['required'],
            'date_end' => ['required'],
        ]);
        
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $day = date('d', strtotime($request->date_end));
        $month = date('n', strtotime($request->date_end));
        $year = date('Y', strtotime($request->date_end));

        $time = time();
        // Convertir fecha
        $date = ['day' => $day,'month' => $meses[($month -1)],'year' => $year];
        $pdf1 = '';
        if (isset($request->letters[0])) {
            $pdf1 = PDF::loadView('end_work/pdf/letter_1',['data'=>$request,'id' => $id,'date' => $date]);
            $pdf1->save(storage_path('app/public/end_work/') .$time.'_CARTA_DE_RECOMENDACION.pdf');
        }
        $pdf2 = '';
        if (isset($request->letters[1])) {
            $pdf2 = PDF::loadView('end_work/pdf/letter_2',['data'=>$request,'id' => $id,'date' => $date]);
            $pdf2->save(storage_path('app/public/end_work/') .$time.'_CARTA_EXAMENES_MEDICOS.pdf');
        }
        $pdf3 = '';
        if (isset($request->letters[2])) {
            $pdf3 = PDF::loadView('end_work/pdf/letter_3',['data'=>$request,'id' => $id,'date' => $date]);
            $pdf3->save(storage_path('app/public/end_work/') .$time.'_CARTA_TERMINACION_CONTRATO.pdf');
        }
        $pdf4 = '';
        if (isset($request->letters[3])) {
            $pdf4 = PDF::loadView('end_work/pdf/letter_4',['data'=>$request,'id' => $id,'date' => $date,'document' => 'end_work'.$time.'_CARTA_RETIRO_CESANTIAS.pdf']);
            $pdf4->save(storage_path('app/public/end_work/') .$time.'_CARTA_RETIRO_CESANTIAS.pdf');
        }

        if (isset($request->letters[0])) {
            $letter = Letter::create([
                'responsable_id' => auth()->id(),
                'register_id' => $id->register->id,
                'type' => 'CARTA_DE_RECOMENDACION',
                'data' => $request->reason1.' -,- '.$request->letter1,
                'date' => $request->date,
                'status' => 1,
            ]);
            $letter->file()->create([
                'name' => $time.'_CARTA_DE_RECOMENDACION.pdf',
                'description' => 'Carta de recomentación de '.$id->name,
                'size' => '44 KB',
                'type' => 'pdf',
                'url' => 'public/end_work/'.$time.'_CARTA_DE_RECOMENDACION.pdf',
                'state' => 1,
            ]);
        }
        if (isset($request->letters[1])) {
            $letter = Letter::create([
                'responsable_id' => auth()->id(),
                'register_id' => $id->register->id,
                'type' => 'CARTA_EXAMENES_MEDICOS',
                'data' => $request->letter2,
                'date' => $request->date,
                'status' => 1,
            ]);
            $letter->file()->create([
                'name' => $time.'_CARTA_EXAMENES_MEDICOS.pdf',
                'description' => 'Carta de examenes medicos de '.$id->name,
                'size' => '44 KB',
                'type' => 'pdf',
                'url' => 'public/end_work/'.$time.'_CARTA_EXAMENES_MEDICOS.pdf',
                'state' => 1,
            ]);
        }
        if (isset($request->letters[2])) {
            $letter = Letter::create([
                'responsable_id' => auth()->id(),
                'register_id' => $id->register->id,
                'type' => 'CARTA_TERMINACION_CONTRATO',
                'data' => $request->reason3.' -,- '.$request->letter3,
                'date' => $request->date,
                'status' => 1,
            ]);
            $letter->file()->create([
                'name' => $time.'_CARTA_TERMINACION_CONTRATO.pdf',
                'description' => 'Carta de terminación de contrato de '.$id->name,
                'size' => '44 KB',
                'type' => 'pdf',
                'url' => 'public/end_work/'.$time.'_CARTA_TERMINACION_CONTRATO.pdf',
                'state' => 1,
            ]);
        }
        if (isset($request->letters[3])) {
            $letter = Letter::create([
                'responsable_id' => auth()->id(),
                'register_id' => $id->register->id,
                'type' => 'CARTA_RETIRO_CESANTÍAS',
                'data' => $request->layoffs.' -,- '.$request->letter4,
                'date' => $request->date,
                'status' => 1,
            ]);
            $letter->file()->create([
                'name' => $time.'_CARTA_RETIRO_CESANTIAS.pdf',
                'description' => 'Carta de retiro de cesantías de '.$id->name,
                'size' => '44 KB',
                'type' => 'pdf',
                'url' => 'public/end_work/'.$time.'_CARTA_RETIRO_CESANTIAS.pdf',
                'state' => 1,
            ]);
        }
        
        if ($id->register->hasContract()) {
            Contract::where('id',$id->register->hasContract()->id)->update([
                'last_date' => $request->date_end,
            ]);
        }
        $id->register->update([
            'date_start' => $request->date,
            'date_end' => $request->date_end,
            'state' => 2,
        ]);
        
        $id->notify(new notificationMain('','Terminación de contracto '.$id->name,'/user/end_work/signature'));
        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Terminar contratación de usuarios')) {
                $user->notify(new notificationMain($id->id,'Terminación de contracto en proceso de '.$id->name,'users/show/'));
            }
        }
        
        if (isset($request->check_send_email)) {
            Mail::send('end_work.email.send_letter',['request' => $request, 'id' => $id] , function ($mail) use ($pdf1,$pdf2,$pdf3,$pdf4,$id,$time,$request) {
                $mail->subject("Energitelco S.A.S. Anexos finalización de contrato");
                $mail->to($id->email, $id->name);
                if (isset($request->letters[0])){
                    $mail->attachData($pdf1->output(), $time.'_CARTA_DE_RECOMENDACION.pdf');
                }
                if (isset($request->letters[1])){
                    $mail->attachData($pdf2->output(), $time.'_CARTA_EXAMENES_MEDICOS.pdf');
                }
                if (isset($request->letters[2])){
                    $mail->attachData($pdf3->output(), $time.'_CARTA_TERMINACION_CONTRATO.pdf');
                }
                if (isset($request->letters[3])){
                    $mail->attachData($pdf4->output(), $time.'_CARTA_RETIRO_CESANTIAS.pdf');
                }
            });
        }
        
        return redirect()->route('users')->with('success','Se ha enviado los anexos de finalización de contrato correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (auth()->user()->register && auth()->user()->register->letters) {
            return view('end_work.edit');
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta pagina');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (auth()->user()->register->hasContract()) {
            $contract = Contract::where('id',auth()->user()->register->hasContract()->id)->update([
                'signature_end' => now(),
                'status' => 0,
            ]);
        }else {
            $contract = Contract::where('register_id',auth()->user()->register->id)->where('status', 2)->update([
                'signature_end' => now(),
                'status' => 0,
            ]);
        }
        if (auth()->user()->register) {
            auth()->user()->register->update([
                'state' => 0,
            ]);
        }
        User::where('id',auth()->id())->update([
            'state'=>0
        ]);
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
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

    public function letter_recommendation (){
        return view('end_work.letters.recommendation');
    }
    
    public function letter_recommendation_download (Request $request){
        $user = User::where('cedula',$request->document)->first();
        if ($user && $user->register && $user->register->letters) {
            foreach ($user->register->letters as $letter) {
                if ($letter->status == 1 && $letter->type == 'CARTA_DE_RECOMENDACION'){
                    return Storage::download('public/end_work/'.$letter->file->name);
                }
            }
        }

        return redirect()->route('letter_recommendation')->withErrors(['document' => 'Estas credenciales no coinciden con nuestros registros.']);
    }

    public function witness(User $id)
    {
        return view('end_work.witness',compact('id'));
    }

    public function witness_update(Request $request, User $id)
    {
        if ($id->register->hasContract()) {
            $contract = Contract::where('id',$id->register->hasContract()->id)->update([
                'has_witness' => auth()->id(),
                'signature_end' => now(),
                'status' => 0,
            ]);
        }else {
            $contract = Contract::where('register_id',$id->register->id)->where('status', 2)->update([
                'has_witness' => auth()->id(),
                'signature_end' => now(),
                'status' => 0,
            ]);
        }
        if ($id->register) {
            $id->register->update([
                'state' => 0,
            ]);
        }
        User::where('id',auth()->id())->update([
            'state'=>0
        ]);

        return redirect()->route('users')->with('success','Se ha firmado como testigo la finalización de contrato correctamente');
    }
}
