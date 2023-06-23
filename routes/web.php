<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',function(){
    return view('auth.login');
});

Route::get('/dashboard',function(){
    return view('home');
});

Route::post('/',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::resource('/books',BooksController::class);
Route::resource('/kategori',KategoriController::class);
Route::resource('/peminjaman',PeminjamananController::class);