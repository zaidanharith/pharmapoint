<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    
class LoginController extends Controller
{
    public function index(){
        return view('masuk.index',
        ['title' => 'Masuk'
     ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with(
            'loginError', 'Username atau password salah!'
        );
    }
}
