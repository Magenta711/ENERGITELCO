<?php

namespace App\Http\Controllers\ClientsAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('tienda')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->intended(route('store.show_cart'));
        }
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('tienda')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/product/store/auth/login');
    }

    public function index()
    {
        return view('store.client.login');
    }
}
