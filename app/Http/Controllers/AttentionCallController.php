<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\attention_call\AttentionCall;
use App\Notifications\notificationMain;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class AttentionCallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Realizar llamados de atención a trabajadores', ['only' => ['store','create']]);
        $this->middleware('permission:Ver llamados de atención', ['only' => ['show']]);
        $this->middleware('permission:Responder llamados de atención', ['only' => ['update','edit']]);
        $this->middleware('permission:Editar llamados de atención', ['only' => ['update1','edit1']]);
        $this->middleware('permission:Aprobar llamados de atención', ['only' => ['approve_call','not_approve_call']]);
        $this->middleware('permission:Eliminar llamados de atención', ['only' => ['destroy']]);
    }

    public function index()
    {
        if(
            auth()->user()->hasPermissionTo('Lista de llamados de atención') ||
            auth()->user()->hasPermissionTo('Aprobar llamados de atención')
        ){
            $attention_calls = AttentionCall::with(['responsableCall','receiverCall'])->get();
        }else {
            $attention_calls = AttentionCall::with(['responsableCall','receiverCall'])->where('receiver',auth()->id())->orWhere('responsable',auth()->id())->get();
        }
        return view('attention_call.index',compact('attention_calls'));
    }

    public function create()
    {
        $users = User::where('state',1)->get();
        return view('attention_call.create',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => ['required'],
            'affair' => ['required'],
            'references' => ['required'],
        ]);
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $date = now()->format('d').' de '.$meses[(now()->format('m') -1)].' de '.now()->format('Y');
        $city = general_setting::where('state',1)->pluck('city')->first();
        for ($i=0; $i < count($request->cedula); $i++) { 
            $id = AttentionCall::create([
                'responsable' => auth()->id(),
                'receiver' => $request->cedula[$i],
                'affair'=>$request->affair,
                'references'=>$request->references,
                'header' => $city.' '.$date,
                'state' => 'Sin argumentos',
            ]);

            if($request->hasFile('files')){
                for ($i=0; $i < count($request->file('files')); $i++) { 
                    $file = $request->file('files')[$i];
                    $name = time().str_random().'.'.$file->getClientOriginalExtension();
                    if ($file->getClientOriginalExtension() == 'JPG' || $file->getClientOriginalExtension() == 'PNG' || $file->getClientOriginalExtension() == 'JPEG' || $file->getClientOriginalExtension() == 'jpg' || $file->getClientOriginalExtension() == 'png' || $file->getClientOriginalExtension() == 'jpeg') {
                        $size = 500;
                        Image::make($file->getRealPath())
                            ->resize(null, 500, function ($constraint) {
                                $constraint->aspectRatio();
                            })->save(public_path('storage/human_management/call_attention/'.$name));
                            $size = $file->getClientSize() / 1000;
                    }else{
                        $size = $file->getClientSize() / 1000;
                        $path = Storage::putFileAs('public/human_management/call_attention', $file, $name);
                    }
                    $id->files()->create([
                        'name' => $name,
                        'description' => "Descargo: ".$request->affair,
                        'size' => $size.' KB',
                        'url' => $path,
                        'type' => $file->getClientOriginalExtension(),
                        'state' => 1
                    ]);
                }
            }

            // Mails
            $id->receiverCall->notify(new notificationMain($id->id,'Nuevo descargo '.$id->id,'called_responder/'));
            Mail::send('emails.attention_call', ['id'=>$id], function ($menssage) use($id)
            {
                $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) {
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->receiverCall->email,$id->receiverCall->name)->subject("Energitelco S.A.S. descargo.");
            });
        }
        return redirect()->route('attention_call')->with('success','Se ha realizado un descargo correctamente');
    }

    public function edit(AttentionCall $id)
    {
        if ($id->receiver == auth()->id() && $id->state == 'Sin argumentos'){
            return view('attention_call.responder',compact('id'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    public function update(Request $request, AttentionCall $id)
    {
        if ($id->receiver == auth()->id() && $id->state == 'Sin argumentos'){
            $request->validate([
                'arguments' => ['required'],
            ]);

            $id->update(['arguments'=>$request->arguments,'state'=>'Sin aprobar']);
            
            $id->responsableCall->notify(new notificationMain($id->id,'Descargo argumentado '.$id->id,'show_called/'));
            
            //Mail
            Mail::send('emails.attention_call', ['id'=>$id], function ($menssage) use($id)
            {
                $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) { 
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->responsableCall->email,$id->responsableCall->name)->subject("Energitelco S.A.S. descargo argumentado.");
            });

            return redirect()->route('home')->with('success','Se ha respondido el descargo correctamente');
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    public function edit1(AttentionCall $id)
    {
        return view('attention_call.edit',compact('id'));
    }

    public function update1(Request $request,AttentionCall $id)
    {
        if ($request->affair != ''){
            $id->update($request->all());
            $id->responsableCall->notify(new notificationMain($id->id,'Descargo editado '.$id->id,'show_called/'));
            $id->receiverCall->notify(new notificationMain($id->id,'Descargo editado '.$id->id,'show_called/'));
            ($id->approverCall) ? $id->approverCall->notify(new notificationMain($id->id,'Descargo editado '.$id->id,'show_called/')) : '';
            Mail::send('emails.attention_call', ['id'=>$id], function ($menssage) use($id)
            {
                $emails = system_setting::where('state',1)->pluck('emails_before_approval')->first();
                $company = general_setting::where('state',1)->pluck('company')->first();
                $email = explode(';',$emails);
                for ($i=0; $i < count($email); $i++) { 
                    if($email[$i] != ''){
                        $menssage->to(trim($email[$i]),$company);
                    }
                }
                $menssage->to($id->receiverCall->email,$id->receiverCall->name)->subject("Energitelco S.A.S. Descargo editado.");
            });
    
            return redirect()->route('attention_call')->with('success','Se ha editado el descargo correctamente');
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página.');
    }

    public function show(AttentionCall $id)
    {
        return view('attention_call.show',compact('id'));
    }

    public function destroy(AttentionCall $id)
    {
        $id->delete();

        return redirect()->route('attention_call')->with('success','Se ha borrado el descargo correctamente');
    }
    
    public function not_approve_call(AttentionCall $id)
    {
        $id->update(['state'=>'No aprobado']);

        $id->receiverCall->notify(new notificationMain($id->id,'descargo no aprobado '.$id->id,'show_called/'));

        return redirect()->route('attention_call')->with(['success'=>'El descargo fue desaprobado correctamente','sudmenu' => 10]);
    }

    public function approve_call(Request $request,AttentionCall $id)
    {
        $request->validate([
            'comment' => 'required',
            'type' => 'required',
        ]);

        $id->update(['comment' => $request->comment,'type' => $request->type,'state'=>'Aprobado','approver'=>auth()->id()]);

        $id->receiverCall->notify(new notificationMain($id->id,'descargo aprobado '.$id->id,'show_called/'));

        //Mail
        Mail::send('emails.attention_call', ['id'=>$id], function ($menssage) use($id)
        {
            $emails = system_setting::where('state',1)->pluck('approval_emails')->first();
            $company = general_setting::where('state',1)->pluck('company')->first();
            $email = explode(';',$emails);
            for ($i=0; $i < count($email); $i++) {
                if($email[$i] != ''){
                    $menssage->to(trim($email[$i]),$company);
                }
            }
            $menssage->to($id->receiverCall->email,$id->receiverCall->name)->subject("Energitelco S.A.S. descargo aprobado.");
        });
        return redirect()->route('attention_call')->with(['success'=>'El descargo fue aprobado correctamente','sudmenu'=>10]);
    }
}
