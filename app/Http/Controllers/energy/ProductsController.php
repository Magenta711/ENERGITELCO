<?php

namespace App\Http\Controllers\energy;

use Illuminate\Http\Request;
use App\Models\SolarProducts;
use App\Models\file;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class ProductsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Ver Productos', ['only' => ['index']]);
        $this->middleware('permission:Crear Productos', ['only' => ['store','create']]);
        $this->middleware('permission:Editar Productos', ['only' => ['update','edit']]);
        $this->middleware('permission:ELiminar Productos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=SolarProducts::get();
            // return $id;
        return view('energy.products.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('energy.products.create');
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
            'type'=>['required'],
            'model'=>['required'],
            'amount'=>['required'],
            'price'=>['required']
        ]);
        $request['status']=1;
        $nombre_original = $request['type'];
        $arr_name = explode(' ',$nombre_original);
        $iniciales = '';
        for ($i=0; $i < count($arr_name); $i++) {
            $iniciales = $iniciales.str_split($arr_name[$i])[0];
        }
        for ($i=1; $i<=$request->amount; $i++){
            $id = SolarProducts::create($request->all());
            $codigo='PE-'.$iniciales.'-'.$id->id;
            $id->update(['cod_product'=>strtoupper($codigo)]);
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $name = $request->type.time().'.'.$file->getClientOriginalExtension();
                $size = $file->getClientSize() / 1000;
                $path = Storage::putFileAs('public/energy', $file, $name);
                $id->files()->create([
                    'name' => $name,
                    'description' => 'Foto de Producto Solar',
                    'size' => $size.' KB',
                    'url' => $path,
                    'type' => $file->getClientOriginalExtension(),
                    'state' => 1
                ]);
            }
        }

        return redirect()->route('energy_products')->with('success','Se ha generado los equipos correctamente');
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
    public function update(Request $request,SolarProducts $id)
    {
        $request->validate([
            'type'=>['required'],
            'model'=>['required'],
            'price'=>['required']
        ]);

        $id->update($request->all());

        return redirect()->route('energy_products')->with('success','Se ha actualizado el equipo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SolarProducts $id)
    {
        $id->delete();
        return redirect()->route('energy_products')->with('success','Se ha eliminado el equipo correctamente');
    }
}
