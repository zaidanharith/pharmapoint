<?php

use App\Models\Category;
use App\Models\Medicines;
use Illuminate\Support\Str;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Models\MedicineDescription;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicinesController;
use App\Http\Controllers\TransactionDetailController;

Route::get('/', function () {
    return view('beranda',[
        'title'=>'Beranda'
    ]); 
});

Route::get('/katalog', function () {
    return view('katalog',[
        'title'=>'Katalog', 
        'medicines' => Medicines::filter()->orderBy(DB::raw('LOWER(name)'))->paginate(16), 
        'categories' => Category::all(),
    ]); 
});

Route::get('/katalog/kategori', [CategoryController::class, 'index']);

Route::post('/katalog/kategori', [CategoryController::class, 'store']);

Route::put('/katalog/kategori/{category}', [CategoryController::class, 'update']);

Route::delete('/katalog/kategori/{category}', [CategoryController::class, 'destroy']);

Route::get('/katalog/tambah', [MedicinesController::class, 'index']);

Route::post('/katalog/tambah', [MedicinesController::class, 'store']);

Route::get('/katalog/{medicine:slug}', function (Medicines $medicine) {
    return view('detail-katalog',[
        'title' => $medicine->name, 'medicine'=>$medicine,
        'medicine_description' => MedicineDescription::where('medicine_id', $medicine->id)->get()
    ]); 
});

Route::delete('/katalog/{medicine:slug}',[MedicinesController::class, 'destroy'])->middleware('auth');

Route::get('/katalog/{medicine:slug}/ubah', [MedicinesController::class, 'edit'])->middleware('auth');

Route::patch('/katalog/{medicine:slug}/ubah', [MedicinesController::class, 'update'])->middleware('auth');

Route::get('/katalog/{medicine:slug}/keranjang',[CartController::class, 'index'])->middleware('auth');

Route::post('/katalog/{medicine:slug}/keranjang',[CartController::class, 'store'])->middleware('auth');

Route::get('/dashboard/keranjang',[CartController::class, 'cartView'])->middleware('auth');

Route::post('/dashboard/keranjang/beli',[CartController::class, 'buy'])->middleware('auth');

Route::delete('/dashboard/keranjang/{cart:id}/hapus',[CartController::class, 'cartDelete'])->middleware('auth');

Route::get('/masuk', [ LoginController::class,'index'])->middleware('guest');
Route::post('/masuk', [ LoginController::class,'authenticate']);

Route::get('/daftar', [ RegisterController::class,'index'])->middleware('guest');
Route::post('/daftar', [ RegisterController::class,'create']);

Route::get('/dashboard', [ DashboardController::class,'index'])->middleware('auth')->name('dashboard');

Route::get('/dashboard/{user:username}', [UserController::class, 'index'])
    ->middleware('auth');

Route::put('/dashboard/{user:username}', [UserController::class, 'update'])
    ->middleware('auth')
    ->name('user.update');

Route::post('/dashboard/{user}/approve', [DashboardController::class, 'approveAdmin'])
    ->middleware('auth')
    ->name('dashboard.approve');

Route::post('/dashboard/{user}/requestAdmin', [DashboardController::class, 'requestAdmin'])
    ->middleware('auth')
    ->name('dashboard.requestAdmin');

Route::post('/logout', [ LoginController::class,'logout']);


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
