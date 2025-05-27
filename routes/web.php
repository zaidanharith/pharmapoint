<?php

use App\Models\Medicines;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    // return view('welcome'); 
    return view('home',[
        'title'=>'Home'
    ]); 
});

Route::get('/katalog', function () {
    return view('catalogue',[
        'title'=>'Katalog', 'medicines' => Medicines::all(), 'img'=>collect([1,2,3,4,5])
    ]); 
});

Route::get('/katalog/{id}', function ($id) {
    return view('catalogue-detail',[
        'medicine' => Medicines::find($id)
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
