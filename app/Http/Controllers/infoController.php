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
}
