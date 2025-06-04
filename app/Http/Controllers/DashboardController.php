<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    public function index() 
    {   
        return view('dashboard.index', [
            'title' => 'Dashboard',
        ]);
    }
}