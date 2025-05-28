<?php

use App\Models\Medicines;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    // return view('welcome'); 
    return view('home',[
        'title'=>'Home'
    ]); 
});

Route::get('/katalog', function () {
    return view('catalogue',[
        'title'=>'Katalog', 'medicines' => Medicines::filter()->orderBy('name')->paginate(15)
    ]); 
});

Route::get('/katalog/{medicine:slug}', function (Medicines $medicine) {
    return view('catalogue-detail',[
        'title' => $medicine->name, 'medicine'=>$medicine
    ]); 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
