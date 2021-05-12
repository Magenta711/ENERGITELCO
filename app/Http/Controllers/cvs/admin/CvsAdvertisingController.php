<?php

namespace App\Http\Controllers\cvs\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\cvs_advertising;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CvsAdvertisingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:CVS Lista de publicidades|CVS Ver publicidades|Crear publicidades|CVS Editar publicidades',['only' => ['index']]);
        $this->middleware('permission:CVS Crear publicidades',['only' => ['create','store']]);
        $this->middleware('permission:CVS Editar publicidades',['only' => ['edit','update']]);
        $this->middleware('permission:CVS Ver publicidades',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings = cvs_advertising::orderBy('status','DESC')->get();
        $actives = 0;
        foreach ($advertisings as $value) {
            if ($value->date_start <= now()->format('Y-m-d') && $value->date_end >= now()->format('Y-m-d') && $value->status != 0) {
                $value->update([ 'status' => 1 ]);
                $r[] = $value->date_start.' <= '.now()->format('Y-m-d').' Y '.$value->date_end.' >= '.now()->format('Y-m-d').' = '.$value->status.' **';
                $actives++;
            }else {
                $value->update([ 'status' => 0 ]);
                $r[] = $value->date_start.' <= '.now()->format('Y-m-d').' Y '.$value->date_end.' >= '.now()->format('Y-m-d').' = '.$value->status;
            }
        }
        return view('cvs.admin.advertising.index',compact('advertisings','actives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertising = cvs_advertising::where('status',1)->first();
        $advertising->date_end = Carbon::create($advertising->date_end)->addDay()->format('Y-m-d');
        return view('cvs.admin.advertising.create',compact('advertising'));
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
            'name' => ['required'],
            'file' => ['required'],
            'date_start' => ['required'],
        ]);

        $advertising = cvs_advertising::where('status',1)->first();
        if ($request->date_start <= $advertising->date_end) {
            $status = 1;
            if ($request->date_start == now()->format('Y-m-d')) {
                $status = 0;
            }
            $advertising->update([
                'date_end' => Carbon::create($request->date_start)->subDay()->format('Y-m-d'),
                'status' => $status,
            ]);
        }

        $request['status'] = ($status == 1) ? 0 : 1;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $path = Storage::putFileAs('public/cvs/advertising/', $file, $name);
            $request['file'] = $name;
        }
        
        cvs_advertising::create($request->all());

        return redirect()->route('cvs_admin_advertising')->with('success','Se ha creado la publicidad correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_advertising $id)
    {
        return view('cvs.admin.advertising.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(cvs_advertising $id)
    {
        if ($id->status == 1) {
            return view('cvs.admin.advertising.edit',compact('id'));
        }
        return redirect()->route('home')->with('success','No tienes acceso a esta página');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,cvs_advertising $id)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required'],
            'date_start' => ['required'],
        ]);

        if ($request->hasFile('file_up')) {
            $file = $request->file('file_up');
            $name = time().str_random().'.'.$file->getClientOriginalExtension();
            $request['file'] = $name;
            Storage::delete('public/cvs/advertising/'.$id->file);
            Storage::putFileAs('public/cvs/advertising/', $file, $name);
        }
        
        $id->update($request->all());

        return redirect()->route('cvs_admin_advertising')->with('success','Se ha actualizado la publicidad correctamente');
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
}
