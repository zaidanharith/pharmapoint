<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicines;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public function index() 
    {   
        return view('dashboard.index', [
            'title' => 'Dashboard', 'users' => User::all(), 'medicines' => Medicines::all(), 'categories' => Category::all(),
        ]);
    }

    public function approveAdmin(Request $request, User $user)
    {
        if ($request->action === 'approve') {
            $user->update([
                'is_admin' => true,
                'request_admin' => false,
                'adimin_verified_at' => now()
            ]);
        } else {
            $user->update([
                'request_admin' => false
            ]);
        }
        return redirect('/dashboard');
    }

    public function requestAdmin(Request $request, User $user)
    {
        if ($request->action === 'request') {
            $user->update([
                'request_admin' => true,
            ]);
        } else {
            $user->update([
                'request_admin' => false
            ]);
        }
        return redirect('/dashboard');
    }
}