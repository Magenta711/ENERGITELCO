<?php

namespace App\Http\Controllers\execution_works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\execution_work\kits;
use App\Models\execution_work\tools;
use App\User;
use Illuminate\Support\Str;

class KitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de kits|Crear kits|Ver kits|Editar Kits|Editar todos los Kits|Eliminar Kits|Eliminar todos los Kits',['only' => ['index']]);
        $this->middleware('permission:Crear kits',['only' => ['create','store']]);
        $this->middleware('permission:Ver kits',['only' => ['show']]);
        $this->middleware('permission:Editar Kits',['only' => ['edit','update']]);
        $this->middleware('permission:Editar todos los Kits',['only' => ['edit_all','update_all']]);
        $this->middleware('permission:Eliminar Kits',['only' => ['destroy']]);
        $this->middleware('permission:Eliminar todos los Kits',['only' => ['destroy_all']]);
    }

    public function index()
    {
        $kits = kits::with(['responsable','estado_kit'])->get();
       
        return view('execution_works.kits.index', compact('kits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        return view('execution_works.kits.create', compact('usuarios'));
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
            'nombre' => ['required'],
            'responsable_id' => ['required'],
            'cantidad' => ['required']
        ]);
        $request['estado_id'] = 2;
        $request['token'] = Str::random(10);//Asi se puede crear el token
        $nombre_original = $request['nombre'];
        for ($i=0; $i < $request->cantidad; $i++) {
            $request['nombre'] = $nombre_original." ".($i+1);
            $request['nombre_original'] = $nombre_original;
            $kit = kits::create($request->all());


            $codigo = 'O-FR-7-'.$kit->id;
            $kit->update([ 'codigo' => $codigo ]);
            for ($j=1; $j <= count($request->item); $j++) {
                $tool = tools::create([
                    'kit_id'=>$kit->id,  
                    'nombre' => $request->item[$j],
                    'cantidad' => $request->amount[$j],
                    'marca' => $request->marca[$j],
                    'Observaciones' => $request->observacion[$j],
                ]);
            }
        }
        
        return redirect()->route('kits')->with('success','Se ha creado el kit correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $id = kits::find($id);
        return view('execution_works.kits.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $usuarios = User::where('state',1)->with('roles')->get();
        $id = kits::find($id);
        return view('execution_works.kits.edit', compact('id','usuarios'));
    }

    public function edit_all($id)
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        $id = kits::find($id);
        return view('execution_works.kits.edit_all', compact('id','usuarios'));
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
        $request->validate([
            'nombre' => ['required'],
            'item'=>['required'],
        ]);
        
        
        Kits::find($id)->update($request->all());
        tools::where('kit_id',$id)->delete();
        for ($j=1; $j <= count($request->item); $j++) {
            $tool = tools::create([
                'kit_id'=>$id,  
                'nombre' => isset($request->item[$j]) ? $request->item[$j] : null,
                'cantidad' => isset($request->amount[$j]) ? $request->amount[$j] : null,
                'marca' => isset($request->marca[$j]) ? $request->marca[$j] : null,
                'Observaciones' => isset($request->observaciones[$j]) ? $request->observaciones[$j] : null,
            ]);
        }
        return redirect()->route('kits_show', $id)->with('success','Se ha editado el kit correctamente'); 
    }

    public function update_all(Request $request, $token)
    {
        $request->validate([
            'nombre' => ['required'],
            'item'=>['required'],
            // 'responsable_id' => ['required'],
            // 'cantidad' => ['required']
        ]);
        Kits::where('token',$token)->update([
            'nombre' => $request->nombre,
            // 'responsable_id'=> $request->responsable_id
        ]);
        $kits = Kits::where('token',$token)->get();
        
        foreach ($kits as $key => $kit) {
            tools::where('kit_id',$kit->id)->delete();
            for ($j=1; $j <= count($request->item); $j++) {
                $tool = tools::create([
                    'kit_id'=>$kit->id,  
                    'nombre' => isset($request->item[$j]) ? $request->item[$j] : null,
                    'cantidad' => isset($request->amount[$j]) ? $request->amount[$j] : null,
                    'marca' => isset($request->marca[$j]) ? $request->marca[$j] : null,
                    'Observaciones' => isset($request->observaciones[$j]) ? $request->observaciones[$j] : null,
                ]);
            }
        }
        // return $request;
       return redirect()->route('kits')->with('success','Se ha editado los kits correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        Kits::destroy($id);
        return redirect()->route('kits')->with('success','Se ha eliminado el kit correctamente'); 
        
    }

    public function destroy_all($token)
    {
        //delete
        // return $token;
        Kits::where('token',$token)->delete();
        return redirect()->route('kits')->with('success','Se ha eliminado todos los kits correctamente'); 
        
    }
}
