<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Petugas\UserController;
use App\Http\Controllers\Petugas\PetugasController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
 
Route::get('/', function () {
    return view('/welcome');    
});
 
Auth::routes();
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk', [App\Http\Controllers\HomeController::class, 'produk'])->name('products.index');
 
// Admin Routes
Route::middleware(['petugas'])->group(function () {
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/kategori', CategoryController::class);
    Route::resource('/laporan', ReportController::class);

    // respon
    Route::get('/respon/create/{report}', [ResponseController::class, 'create'])->name('respon.create');
    Route::post('/respon', [ResponseController::class, 'store'])->name('respon.store');
    Route::get('/respon/{response}/edit', [ResponseController::class, 'edit'])->name('respon.edit');
    Route::put('/respon/{response}', [ResponseController::class, 'update'])->name('respon.update');
    // tambahkan route admin lainnya di sini
});
 
// User Routes
Route::middleware(['auth'])->group(function () {
    // tambahkan route user lainnya di sini
});