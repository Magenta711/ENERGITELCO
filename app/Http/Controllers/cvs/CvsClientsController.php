<?php

namespace App\Http\Controllers\cvs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cvs\cvs_client;

class CvsClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:CVS Lista de clientes|CVS Ver clientes',['only' => ['index']]);
        $this->middleware('permission:CVS Ver clientes',['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = cvs_client::get();
        return view('cvs.clients.index',compact('clients'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cvs_client $id)
    {
        return view('cvs.clients.show',compact('id'));
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

    public function unsubscribe($token)
    {
        $id = cvs_client::where('token',$token)->first();
        if ($id) {
            return view('cvs.clients.unsubscribe',compact('id'));
        }else {
            return abort(404);
        }
    }
    
    public function unsubscribe_save($token)
    {
        $id = cvs_client::where('token',$token)->first();
        if ($id) {
            $id->update([
                'send_emails' => 0
            ]);
            return redirect()->route('cvs_clients_subscribe',$token)->with('success','Tu suscripción se ha cancelado correctamente');
        }else {
            return abort(404);
        }

    }

    public function subscribe($token)
    {
        $id = cvs_client::where('token',$token)->first();
        if ($id) {
            return view('cvs.clients.subscribe',compact('id'));
        }else {
            return abort(404);
        }
    }
    
    public function subscribe_save($token)
    {
        $id = cvs_client::where('token',$token)->first();
        if ($id) {
            $id->update([
                'send_emails' => 1
            ]);
            return redirect()->route('cvs_clients_unsubscribe',$token)->with('success','Tu suscripción ha sido exitosa');
        }else {
            return abort(404);
        }
    }
}
