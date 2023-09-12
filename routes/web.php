<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// routes/web.php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::POST('/',[SesiController::class,'login']);
});
Route::get('/home', function () {
    // Periksa peran pengguna saat mengakses /home
    if (Auth::user()->role == 'admin') {
        return redirect('/admin');
    } elseif (Auth::user()->role == 'pegawai') {
        return redirect('/pegawai');
    }
});
Route::middleware(['auth'])->group(function(){
    Route::middleware(['userAkses:admin'])->group(function () {
        // admin
        Route::get('/admin',[AdminController::class,'index'])->middleware('userAkses:admin');
        Route::get('/admin/team', function () {
            return view('admin.team.index');
        });
        Route::get('/admin/project', function () {
            return view('admin.project.index');
        });
    });
    Route::middleware(['userAkses:pegawai'])->group(function () {
        // Pegawai
        Route::get('/pegawai',[AdminController::class,'pegawai'])->middleware('userAkses:pegawai');
        Route::get('/pegawai/project', function () {
            return view('pegawai.project.index');
        });
    });
    Route::get('/logout',[SesiController::class,'logout']);
});
