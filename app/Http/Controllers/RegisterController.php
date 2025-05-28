<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register',[
            'title' => 'Register'
        ]); 
    }

    public function create(Request $request){
        $request->validate([
            'name'=>['required','max:255'],
            'username'=>['required','min-1','unique:users','max:255'],
            'email'=>['required','email','unique:users','max:255'],
            'password'=>['required','min:4'],
            'password-confirm'=>['required','min:4'],
            'is-admin'=>['required','boolean']
        ]);

        dd($request);
    }
}
