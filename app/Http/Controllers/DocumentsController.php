<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use App\Notifications\notificationMain;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Lista de documentos|Ver documentos|Crear documentos|Editar documentos|Eliminar documentos|Descargar documentos',['only' => ['index']]);
        $this->middleware('permission:Editar documentos',['only' => ['edit','update']]);
        $this->middleware('permission:Crear documentos',['only' => ['ceate','store']]);
        $this->middleware('permission:Eliminar documentos',['only' => ['destroy']]);
        $this->middleware('permission:Ver documentos',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = document::where('status','!=',3)->get();
        return view('documents.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
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
            'code' => ['required','string','max:20'],
            'name' => ['required'],
            'version' => ['required','integer'],
            'date' => ['required'],
            'page_total' => ['required','integer'],
            'contract' => ['required'],
            'status' => ['required'],
            'file' => ['required'],
        ]);

        $time = time();
        $str = Str::random(5);

        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = $time.$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            $path = Storage::putFileAs('private/documents', $file, $name);
            $document = document::create($request->all()); // Estado sin aprobar
            $document->update([
                'responsable' => auth()->id(),
            ]);
            $document->file()->create([
                'name' => $name,
                'description' => $request->name,
                'size' => $size.' KB',
                'url' => $path,
                'type' => $file->getClientOriginalExtension(),
                'state' => 1
            ]);

            if ($request->contract) {
                $users = User::where('state',1)->get();
                foreach ($users as $user) {
                    $user->notify(new notificationMain('','Un nuevo documento requiere firma','curriculum/signature/'));
                }
            }else{
                $users = User::where('state',1)->get();
                foreach ($users as $user) {
                    if ($user->hasPermissionTo('Lista de documentos')) {
                        $user->notify(new notificationMain($document->id,'Nuevo documento '.$document->id,'documents/'));
                    }
                }
            }
        }
        
        return redirect()->route('documents')->with('success','Se ha creado el documento correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(document $id)
    {
        return view('documents.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(document $id)
    {
        return view('documents.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,document $id)
    {
        $request->validate([
            'code' => ['required','string','max:20'],
            'name' => ['required'],
            'version' => ['required','integer'],
            'date' => ['required'],
            'page_total' => ['required','integer'],
            'contract' => ['required'],
            'status' => ['required'],
        ]);
        $hasContract = $id->contract;
        $id->update($request->all()); // Estado sin aprobar 

        $time = time();
        $str = Str::random(5);
        
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $name = $time.$str.'.'.$file->getClientOriginalExtension();
            $size = $file->getClientSize() / 1000;
            Storage::delete('private/documents/'.$id->file->name);
            $path = Storage::putFileAs('private/documents', $file, $name);
            $id->file()->update([
                'name' => $name,
                'description' => $request->name,
                'size' => $size.' KB',
                'url' => $path,
                'type' => $file->getClientOriginalExtension(),
                'state' => 1
            ]);
        }

        if (!$hasContract && $request->contract) {
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                $user->notify(new notificationMain('','Un documento requiere firma','curriculum/signature/'));
            }
        }else{
            $users = User::where('state',1)->get();
            foreach ($users as $user) {
                if ($user->hasPermissionTo('Lista de documentos')) {
                    $user->notify(new notificationMain($id->id,'Documento actualizado '.$id->id,'documents/'));
                }
            }
        }

        return redirect()->route('documents')->with('success','Se ha actalizado el documento correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(document $id)
    {
        $id->update(['status' => 3]);
        return redirect()->route('documents')->with('success','Se ha eliminado el documento correctamente');
    }

    public function download(document $id)
    {
        return Storage::download('private/documents/'.$id->file->name);
    }


}
