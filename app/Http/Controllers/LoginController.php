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
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        $remember = $request->boolean('remember_me');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        if (Auth::attempt(['username' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    
        return back()->with([
            'loginError' => 'Email/Username atau password salah!',
            'email' => $credentials['email']
        ]);
    }


    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/masuk')->with('success', 'Anda telah berhasil keluar!');
    }
}
