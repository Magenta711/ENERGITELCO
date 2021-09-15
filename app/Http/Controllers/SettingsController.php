<?php

namespace App\Http\Controllers;

use App\Models\general_setting;
use App\Models\system_setting;
use App\Models\SystemMessages;
use App\Models\Positions;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Configuraciones generales',['only' => 'index']);
        $this->middleware('permission:Configurar cargos',['only' => 'position_setting','position_setting_show','position_setting_edit','position_setting_create','position_setting_store','position_setting_update',]);
        $this->middleware('permission:Configuraciones del sistema',['only' => 'system','system_store']);
        $this->middleware('permission:Configurar mensajes en el sistema',['only' => 'messages','messages_store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = general_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();
        $value2 = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();
        return view('settings.index',compact('value','value2'));
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
        $request->validate([
            'name_app' => ['required'],
            'nit' => ['required'],
            'city' => ['required'],
            'company' => ['required'],
            'tel' => ['required'],
            'address' => ['required'],
            'email' => ['required','email']
        ]);

        $settings = general_setting::where('id',$request->current)->update(['state'=>0]);
        general_setting::create($request->all());

        $system = system_setting::where('id',$request->current)->first();

        // if ($request->hasFile('file_main')){
        //     $file = $request->file('file_main');
        //     $name = time().str_random().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/img/',$name);
        //     $request['file_main'] = $name;
        // }else {
        //     $request['file_main'] = $system->file_main;
        // }
        // if ($request->hasFile('file_main_small')){
        //     $file = $request->file('file_main_small');
        //     $name = time().str_random().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/img/',$name);
        //     $request['file_main_small'] = $name;
        // }else {
        //     $request['file_main_small'] = $system->file_main_small;
        // }
        // if ($request->hasFile('file_ccjl')){
        //     $file = $request->file('file_ccjl');
        //     $name = time().str_random().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/img/',$name);
        //     $request['file_ccjl'] = $name;
        // }else {
        //     $request['file_ccjl'] = $system->file_ccjl;
        // }
        // if ($request->hasFile('file_claro')){
        //     $file = $request->file('file_claro');
        //     $name = time().str_random().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/img/',$name);
        //     $request['file_claro'] = $name;
        // }else {
        //     $request['file_claro'] = $system->file_claro;
        // }
        // if ($request->hasFile('file_cc')){
        //     $file = $request->file('file_cc');
        //     $name = time().str_random().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/img/',$name);
        //     $request['file_cc'] = $name;
        // }else {
        //     $request['file_cc'] = $system->file_cc;
        // }
        // if ($request->hasFile('file_mintic')){
        //     $file = $request->file('file_mintic');
        //     $name = time().str_random().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/img/',$name);
        //     $request['file_mintic'] = $name;
        // }else {
        //     $request['file_mintic'] = $system->file_mintic;
        // }

        $system->update(['state'=>0]);
        $request['url'] = config('app.url');
        $request['approval_emails'] = $system->approval_emails;
        $request['emails_before_approval'] = $system->emails_before_approval;
        $request['emails_cvs'] = $system->emails_cvs;
        $request['emails_ccjl'] = $system->emails_ccjl;
        $request['emails_contable'] = $system->emails_contable;
        $request['emails_error'] = $system->emails_error;
        system_setting::create($request->all());

        return redirect()->route('settings')->with('success','Se actualizo los datos generales correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function system()
    {
        $value = system_setting::where('state',1)->orderBy('id','DESC')->take(1)->first();
        return view('settings.system',compact('value'));
    }

    public function system_store(Request $request)
    {
        $request->validate([
            'approval_emails' => ['required'],
            'emails_before_approval' => ['required'],
            'emails_cvs' => ['required'],
            'emails_ccjl' => ['required'],
            'emails_contable' => ['required'],
            'emails_error' => ['required'],
        ]);
        $system = system_setting::where('id',$request->current)->first();
        $system->update(['state'=>0]);
        $request['url'] = config('app.url');
        $request['name_responsable'] = $system->name_responsable;
        $request['tel_responsable'] = $system->tel_responsable;
        $request['email_responsable'] = $system->email_responsable;
        system_setting::create($request->all());
        return redirect()->route('system')->with('success','Se han actualizado las configuraciones del sistema correctamente');
    }

    public function messages()
    {
        $messages = SystemMessages::where('state',1)->get();
        return view('settings.messages',compact('messages'));
    }

    public function messages_store(Request $request)
    {
        $request->validate([
            
        ]);
        SystemMessages::where('state',1)->update([
            'state' => 0,
        ]);
        for ($i=0; $i < count($request->description); $i++) {
            SystemMessages::create([
                'name' => $request->name[$i],
                'description' => $request->description[$i],
                'state' => 1,
            ]);
        }
        return redirect()->route('messages')->with('success','Se actualizaron los mensajes del sistema correctamente');
    }

    public function position_setting()
    {
        $positions = Positions::with(['users'])->where('state',1)->get();

        return view('settings.position.index',compact('positions'));
    }

    public function position_setting_show(Positions $id)
    {
        return view('settings.position.show',compact('id'));
    }
    public function position_setting_edit(Positions $id)
    {
        return view('settings.position.edit',compact('id'));
    }

    public function position_setting_create()
    {
        return view('settings.position.create');
    }
    
    public function position_setting_store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:positions'],
            'type_evaluation' => ['required'],
            'description' => ['required'],
            'offer' => ['required'],
        ]);
        
        $request['state'] = 1;
        
        Positions::create($request->all());

        return redirect()->route('position_setting')->with('success','Se ha creado el cargo correctamente');
    }

    public function position_setting_update(Request $request,Positions $id)
    {
        $request->validate([
            'name' => ['required'],
            'type_evaluation' => ['required'],
            'description' => ['required'],
            'offer' => ['required'],
        ]);
        
        $id->update($request->all());

        return redirect()->route('position_setting')->with('success','Se ha actualizado el cargo correctamente');
    }

    public function upload()
    {
        return response()->json([ 'success' => 'Good' ]);
    }
}
