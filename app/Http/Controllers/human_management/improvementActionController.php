<?php

namespace App\Http\Controllers\human_management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\human_magement\improvementAction;
use App\Models\human_magement\improvementActionDetail;
use App\Models\human_magement\improvementActionDetailUser;
use App\User;

class improvementActionController extends Controller
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
        $improvements = improvementAction::get();
        return view('human_management.improvement_action.index',compact('improvements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('state',1)->get();
        return view('human_management.improvement_action.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $improvement = improvementAction::create($request->all());
        for ($i=0; $i < count($request->homework); $i++) { 
            $detail = improvementActionDetail::create([
                'improvement_id' => $improvement->id,
                'text' => $request->homework[$i],
                'start_date' => $request->start_date_action[$i],
                'end_date' => $request->end_date_action[$i],
                'type' => 'action',
            ]);
            // for ($j=0; $j < count($request->user_action_id[$i]); $j++) { 
                improvementActionDetailUser::create([
                    'user_id' => $request->user_tracing_id[$i],
                    'detail_id' => $detail->id
                ]);
            // }
        }
        for ($i=0; $i < count($request->action); $i++) { 
            $detail = improvementActionDetail::create([
                'text' => $request->action[$i],
                'start_date' => $request->start_date_tracing[$i],
                'end_date' => $request->end_date_tracing[$i],
                'type' => 'tracing',
            ]);
            // for ($j=0; $j < count($request->user_tracing_id[$i]); $j++) { 
                improvementActionDetailUser::create([
                    'user_id' => $request->user_tracing_id[$i],
                    'detail_id' => $detail->id
                ]);
            // }
        }

        return redirect()->route('improvement_action')->with('success','Se ha creado la acción correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(improvementAction $id)
    {
        return view('human_management.improvement_action.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(improvementAction $id)
    {
        return view('human_management.improvement_action.edit');
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
}
