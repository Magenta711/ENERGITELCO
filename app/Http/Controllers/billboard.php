<?php

namespace App\Http\Controllers;
use App\Models\billboard as bill;
use App\Models\billboard\billboard_type;
use App\User;
use App\Notifications\notificationMain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class billboard extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('verified');
        $this->middleware('permission:Editar documentos de la cartelera', ['only' => ['update']]);
        $this->middleware('permission:Eliminar documentos de la cartelera', ['only' => ['destroy']]);
        $this->middleware('permission:Crear documentos para la cartelera', ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = bill::where('estado','Disponible')->with(['user','type'])->get();
        $bill_types = billboard_type::where('status',1)->get();
        return view('billboard.index',compact('bills','bill_types'));
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
            'name_document' => ['required'],
            'document' => ['required'],
            'type_billboard' => ['required'],
        ]);

        $str = Str::random(5);

        if($request->hasFile('document')){
            $file = $request->file('document');
            $document = time().'_'.$str.'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/file/billboard/',$document);
        }else {
            return redirect()->back()->withErrors(['Debe seleccionar un archivo'])->withInput();
        }

        bill::create([
            'name_document' => $request->name_document,
            'responsable'=>auth()->id(),
            'document'=>$document,
            'type_billboard' => $request->type_billboard,
        ]);

        $users = User::where('state',1)->get();

        foreach ($users as $user) {
            if ($user->hasPermissionTo('Consultar cartelera')) {
                $user->notify(new notificationMain('','Nuevo documento "'.$request->name_document.'" disponible en la catelera ','home'));
            }
        }

        return redirect()->route('billboard')->with('success','Se ha agregado un documento correctamente a la cartelera.');
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
    public function update(Request $request,bill $id)
    {
        $id->update([
            'name_document' => $request->name_document,
            'type_billboard' => $request->type_billboard,
        ]);

        $users = User::where('state',1)->get();
        
        foreach ($users as $user) {
            if ($user->hasPermissionTo('Consultar cartelera')) {
                $user->notify(new notificationMain('',$request->name_document.' fue actualizado ','home'));
            }
        }

        return redirect()->route('billboard')->with('success','Se ha actualizado un documento correctamente a la cartelera.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(bill $id)
    {
       $id->update([
            'estado' => 'Eliminado',
        ]);
        return redirect()->route('billboard')->with('success','Se ha eliminado un documento correctamente de la cartelera.');
    }
}

//Administracion de la cartelera, quien descarga el documento.