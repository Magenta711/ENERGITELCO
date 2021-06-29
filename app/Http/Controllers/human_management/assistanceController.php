<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssistanceUser;
use App\Models\Assistance;
use App\Models\Work1;
use App\User;
use Carbon\Carbon;

class assistanceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assistances = Assistance::get();
        return view('human_management.assistance.index',compact('assistances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        $works = Work1::whereBetween('created_at',[now()->format('Y-m-d 00:00:00'),now()->format('Y-m-d 23:59:59')])->get();
        return view('human_management.assistance.create',compact('users','works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Assistance::create([
            'responsable_id' => auth()->id(),
            'date' => $request->date,
        ]);
        foreach ($request->commentary as $key => $value) {
            AssistanceUser::create([
                'user_id' => $key,
                'assistance_id' => $id->id,
                'assistance_check' => isset($request->assistance[$key]) ? true : false,
                'where' => isset($request->where[$key]) ? $request->where[$key] : null,
                'start_time' => isset($request->start_time[$key]) ? $request->start_time[$key] : null,
                'end_time' => isset($request->end_time[$key]) ? $request->end_time[$key] : null,
                'commentary' => $request->commentary[$key],
            ]);
        }
        $id->update([
            'total_user' => count($request->commentary),
            'total_faltal' => count($request->commentary) - count($request->assistance)
        ]);
        return redirect()->route('assistance')->with('success','Se ha creado la asistencia correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Assistance $id)
    {
        return view('human_management.assistance.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Assistance $id)
    {
        $works = Work1::whereBetween('created_at',[Carbon::create($id->date)->format('Y-m-d 00:00:00'),Carbon::create($id->date)->format('Y-m-d 23:59:59')])->get();
        return view('human_management.assistance.edit',compact('id','works'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Assistance $id)
    {
        foreach ($id->attendees as $item) {
            $item->update([
                'assistance_check' => isset($request->assistance[$item->user_id]) ? true : false,
                'where' => isset($request->where[$item->user_id]) ? $request->where[$item->user_id] : null,
                'start_time' => isset($request->start_time[$item->user_id]) ? $request->start_time[$item->user_id] : null,
                'end_time' => isset($request->end_time[$item->user_id]) ? $request->end_time[$item->user_id] : null,
                'commentary' => $request->commentary[$item->user_id],
            ]);
        }
        $id->update([
            'total_user' => count($request->commentary),
            'total_faltal' => count($request->commentary) - count($request->assistance)
        ]);
        return redirect()->route('assistance')->with('success','Se ha actualizado la asistencia correctamente');
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
