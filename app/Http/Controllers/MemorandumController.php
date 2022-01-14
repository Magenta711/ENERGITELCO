<?php
// 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memorandum;
use App\User;
use App\Models\Positions;
use App\Models\ConfirmMemorandum;
use App\Models\general_setting;
use App\Notifications\notificationMain;
use Illuminate\Support\Facades\Mail;

class MemorandumController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de memorandos|Crear memorandos|Ver memorandos', ['only' => ['index']]);
        $this->middleware('permission:Ver memorandos', ['only' => ['show']]);
        $this->middleware('permission:Crear memorandos', ['only' => ['create','store']]);
        $this->middleware('permission:Editar memorandos', ['only' => ['edit','update1']]);
        $this->middleware('permission:Eliminar memorandos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memorandums = Memorandum::with(['responsable_memo','receivers'=>function ($query)
        {
            $query->with('user');
        }])->get();
        return view('memorandum.index',compact('memorandums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Positions::where('state',1)->get();
        return view('memorandum.create',compact('positions'));
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
            'position' => ['required'],
            'affair' => ['required'],
            'references' => ['required'],
        ]);
        
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $date = now()->format('d').' de '.$meses[(now()->format('m') -1)].' de '.now()->format('Y');
        $city = general_setting::where('state',1)->pluck('city')->first();

        $memo = Memorandum::create($request->all());
        $memo->update(['responsable' => auth()->id(), 'header' => $city.' '.$date]);
        
        for ($i=0; $i < count($request->position); $i++) {
            $users = User::where('state',1)->where('id','!=',auth()->id())->where('position_id',$request->position[$i])->get();
            foreach ($users as $item) {
                ConfirmMemorandum::create([
                    'user_id' => $item->id,
                    'memorandum_id' => $memo->id,
                    'state' => 0,
                ]);
                $item->notify(new notificationMain($memo->id,'Nuevo memorando '.$memo->id,'human_management/memorandum/show/'));
                Mail::send('emails.memorandum', ['id' => $memo,'user' => $item], function ($message) use($item) {
                    $message->to($item->email, $item->name);
                    $message->subject('Energitelco S.A.S. Memorando');
                });
            }
        }

        return redirect()->route('memorandum')->with('success','Se ha enviado el memorando correctamente');
    }
    
    public function update1(Request $request, Memorandum $id)
    {
        $request->validate([
            'position' => ['required'],
            'affair' => ['required'],
            'references' => ['required'],
        ]);

        $id->update($request->all());
        
        for ($i=0; $i < count($request->position); $i++) {
            $users = User::where('state',1)->where('id','!=',auth()->id())->where('position_id',$request->position[$i])->get();
            foreach ($users as $item) {
                $sema = 1;
                foreach ($id->receivers as $receiver){
                    if($receiver->user->id == $item->id){
                        $sema = 0;
                    }
                }
                if ($sema == 1){
                    ConfirmMemorandum::create([
                        'user_id' => $item->id,
                        'memorandum_id' => $id->id,
                        'state' => 0,
                    ]);
                }
                $item->notify(new notificationMain($id->id,'Memorando actualizado '.$id->id,'human_management/memorandum/show/'));
                Mail::send('emails.memorandum', ['id' => $id,'user' => $item], function ($message) use($item) {
                    $message->to($item->email, $item->name);
                    $message->subject('Energitelco S.A.S. Memorando actualizado');
                });
            }
        }

        return redirect()->route('memorandum')->with('success','Se ha actualizado el memorando correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Memorandum::with(['responsable_memo'=>function ($query)
        {
            $query->with('roles');
        },'receivers'=>function ($query)
        {
            $query->with('user');
        }])->find($id);
        return view('memorandum.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Memorandum $id)
    {
        $positions = Positions::where('state',1)->get();
        return view('memorandum.edit',compact('id','positions'));
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
        ConfirmMemorandum::where('user_id',auth()->id())->where('memorandum_id',$id)->update([
            'state' => 1,
        ]);
        return redirect()->route('memorandum')->with('success','Se ha confirmado que ha leido el memorando');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memorandum $id)
    {
        $id->delete();
        return redirect()->route('memorandum')->with('success','Se ha eliminado el memorando correctamente');
    }
}
