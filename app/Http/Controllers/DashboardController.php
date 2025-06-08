<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public function index() 
    {   
        return view('dashboard.index', [
            'title' => 'Dashboard', 'users' => User::all(),
            // 'transactions' => Transaction::with(['user', 'medicine'])
            //     ->orderBy('created_at', 'desc')
            //     ->paginate(10)
        ]);
    }
}