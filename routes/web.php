<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/logout', [LoginController::class, 'logout']);
    Route::resource('/obat', ObatController::class)->parameter('obat', 'id');;
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
