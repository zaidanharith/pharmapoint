<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('daftar.index',[
            'title' => 'Daftar'
        ]); 
    }

    public function create(Request $request){
        $messages = [
            'name.required' => 'Nama lengkap wajib diisi',
            'name.max' => 'Nama lengkap maksimal 255 karakter',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 4 karakter',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_confirmation.same' => 'Konfirmasi password tidak sama dengan password'
        ];
    
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:1', 'unique:users', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users', 'max:255'],
            'password' => ['required', 'min:4'],
            'password_confirmation' => ['required', 'min:4', 'same:password'],
            'request_admin' => ['boolean']
        ], $messages);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/masuk')->with('success', 'Registrasi berhasil, silakan masuk');
    }

}
