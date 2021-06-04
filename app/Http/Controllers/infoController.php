<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class infoController extends Controller
{
    public function termsConditions()
    {
        return view('info.termsConditions');
    }

    public function privacyPolicy()
    {
        return view('info.privacyPolicy');
    }
    
    public function b24_7()
    {
        return view('info.policy_condition_24_7');
    }
}
