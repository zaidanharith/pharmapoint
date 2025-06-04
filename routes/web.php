<?php

use App\Models\Medicines;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('beranda',[
        'title'=>'Beranda'
    ]); 
});

Route::get('/katalog', function () {
    return view('katalog',[
        'title'=>'Katalog', 'medicines' => Medicines::filter()->orderBy('name')->paginate(15)
    ]); 
});

Route::get('/katalog/{medicine:slug}', function (Medicines $medicine) {
    return view('detail-katalog',[
        'title' => $medicine->name, 'medicine'=>$medicine
    ]); 
});

Route::get('/masuk', [ LoginController::class,'index'])->middleware('guest');
Route::post('/masuk', [ LoginController::class,'authenticate']);

Route::get('/daftar', [ RegisterController::class,'index'])->miniddleware('guest');
Route::post('/daftar', [ RegisterController::class,'create']);

Route::get('/dashboard', [ DashboardController::class,'index'])->middleware('auth')->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
