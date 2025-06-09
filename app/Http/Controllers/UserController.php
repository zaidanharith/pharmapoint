<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        
        return view('user.index', [
            'title' => $user->name,
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->id !== $user->id) {
            abort(403);
        }

        $rules = [
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)]
        ];

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'Profil berhasil diperbarui!');
    }
}
