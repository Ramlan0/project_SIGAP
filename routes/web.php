<?php
 

use App\Http\Controllers\Petugas\UserController;
use App\Http\Controllers\Petugas\PetugasController;
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
    // tambahkan route admin lainnya di sini
});
 
// User Routes
Route::middleware(['auth'])->group(function () {
    // tambahkan route user lainnya di sini
});