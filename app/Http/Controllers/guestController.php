<?php

namespace App\Http\Controllers;

use App\Mail\guest_message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class guestController extends Controller
{
    public function send(Request $request)
    {
        if (strlen($request->affair) == '46' && $request->telefono == '' && $request->code == '*f_q=da/ñá' && $request->affair == 'La honestidad cualidad de carácter del humano') {
            Mail::to('jorge.ortega@energitelco.com.co','Jorge Ortega')->queue(new guest_message($request->all()));
        }
        return redirect('/');
    }
}
