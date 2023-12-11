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
        $request->validate([
            'nombre' => ['required'],
            'responsable_id' => ['required'],
            'cantidad' => ['required']
        ]);
        $request['estado_id'] = 2;
        $request['token'] = Str::random(10);//Asi se puede crear el token
        $nombre_original = $request['nombre'];
        $arr_name = explode(' ',$nombre_original);
        $iniciales = '';
        for ($i=0; $i < count($arr_name); $i++) {
            $iniciales = $iniciales.str_split($arr_name[$i])[0];
        }
        $parent = [];
        $request['history'] = now()->format('d/m/Y H:i:s').': creación de un grupo de '.$request->cantidad.' con '.count($request->item).' herramientas por: '.auth()->user()->name."\n";
        for ($i=0; $i < $request->cantidad; $i++) {
            $request['nombre'] = $nombre_original." ".($i+1);
            $request['nombre_original'] = $nombre_original;
            $kit = kits::create($request->all());
            $codigo = "N-".$iniciales."-".$kit->id;
            $kit->update([ 'codigo' => strtoupper($codigo) ]);
            for ($j=0; $j < count($request->item); $j++) {
                $tool = tools::create([
                    'kit_id'=>$kit->id,
                    'nombre' => $request->item[$j],
                    'cantidad' => $request->amount[$j],
                    'marca' => $request->marca[$j],
                    'Observaciones' => $request->observacion[$j],
                    'is_perent' => $i == 0,
                    'perent_id' => $i == 0 ? null : $parent[$j]
                ]);
                if ($i == 0) {
                    $parent[$j] = $tool->id;
                }
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
    public function show(kits $id)
    {
        return view('execution_works.kits.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kits $id)
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        return view('execution_works.kits.edit', compact('id','usuarios'));
    }

    public function edit_all(kits $id)
    {
        $usuarios = User::where('state',1)->with('roles')->get();
        return view('execution_works.kits.edit_all', compact('id','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kits $id)
    {
        // return $request;
        $request->validate([
            'nombre' => ['required'],
            'item'=>['required'],
        ]);

        $nombre = $id->nombre;
        $nombre_original = $request->nombre;
        $token = $id->token;
        if( $request->nombre != $id->nombre_original){
            $nombre_original = $request->nombre;
            $nombre = $request->nombre." ".end(explode(' ',$id->nombre));
            $token = Str::random(10);
        }
        $history = now()->format('d/m/Y H:i:s').': kit individualmente con '.count($request->item).' herramientas editado por: '.auth()->user()->name."\n";
        $id->update([
            'nombre_original' => $nombre_original,
            'nombre' => $nombre,
            'cantidad_herramientas' => count($request->item),
            'history' => $id->history.''.$history
        ]);

        for ($j=0; $j < count($request->item); $j++) {
            if ($request->item_id[$j] == 0) {
                $tool = tools::create([
                    'kit_id'=>$id->id,
                    'nombre' => $request->item[$j],
                    'cantidad' => $request->amount[$j],
                    'marca' => $request->marca[$j],
                    'Observaciones' => $request->observacion[$j],
                    'is_perent' => false,
                    'perent_id' => null
                ]);
            }else {
                $tool = tools::find($request->item_id[$j]);
                $tool->update([
                    'nombre' => $request->item[$j],
                    'cantidad' => $request->amount[$j],
                    'marca' => $request->marca[$j],
                    'Observaciones' => $request->observacion[$j],
                ]);
            }

        }

        return redirect()->route('kits_show', $id)->with('success','Se ha editado el kit correctamente');
    }

    public function update_all(Request $request, $token)
    {
        // return $request;
        $request->validate([
            'nombre' => ['required'],
            'item'=>['required']
        ]);
        $kits = Kits::where('token',$token)->get();
        $parent = [];
        foreach ($kits as $key => $kit) {
            $nombre = $kit->nombre;
            $nombre_original = $request->nombre;
            if( $request->nombre != $kit->nombre_original){
                $nombre_original = $request->nombre;
                $nombre = $request->nombre." ".end(explode(' ',$kit->nombre));
            }
            $history = now()->format('d/m/Y H:i:s').': grupo de '.count($kits).' Kits con '.count($request->item).' herramientas editado por: '.auth()->user()->name."\n";
            $kit->update([
                'nombre_original' => $nombre_original,
                'responsable_id' => $request->responsable_id,
                'nombre' => $nombre,
                'cantidad_herramientas' => count($request->item),
                'history' => $kit->history.''.$history
            ]);

            for ($j=0; $j < count($request->item); $j++) {
                if ($request->item_id[$j] == 0) {
                    $tool = tools::create([
                        'kit_id'=>$kit->id,
                        'nombre' => $request->item[$j],
                        'cantidad' => $request->amount[$j],
                        'marca' => $request->marca[$j],
                        'Observaciones' => $request->observacion[$j],
                        'is_perent' => $key == 0,
                        'perent_id' => $key == 0 ? null : ($request->item_id[$j] > 0 ? $request->item_id[$j] : $parent[$j])
                    ]);
                    if ($key == 0) {
                        $parent[$j] = $tool->id;
                    }
                }else {
                    $tool = tools::find($request->item_id[$j]);
                    if ($key == 0) {
                        $tool->update([
                            'nombre' => $request->item[$j],
                            'cantidad' => $request->amount[$j],
                            'marca' => $request->marca[$j],
                            'Observaciones' => $request->observacion[$j],
                        ]);
                    }else {
                        $tool = tools::where('kit_id',$kit->id)->where('perent_id',$request->item_id[$j])->first();
                        if ($tool) {
                            $tool->where('kit_id',$kit->id)->where('perent_id',$request->item_id[$j])->update([
                                'nombre' => $request->item[$j],
                                'cantidad' => $request->amount[$j],
                                'marca' => $request->marca[$j],
                                'Observaciones' => $request->observacion[$j],
                            ]);
                        }else {
                            $tool = tools::find($request->item_id[$j])->update([
                                'nombre' => $request->item[$j],
                                'cantidad' => $request->amount[$j],
                                'marca' => $request->marca[$j],
                                'Observaciones' => $request->observacion[$j],
                            ]);
                        }
                    }
                }

            }
        }
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
