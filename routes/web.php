<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\c_project;
use App\Http\Controllers\c_team;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\LockScreenController;
use Illuminate\Auth\Events\Logout;
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
    Route::get('/lock-screen', [LockScreenController::class, 'showLockScreenForm'])->name('lock-screen');
    Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');
    Route::middleware(['userAkses:admin'])->group(function () {
        // admin
        Route::get('/admin',[AdminController::class,'index'])->middleware('userAkses:admin')->name('dashboard.admin');
        Route::resource('/admin/team', c_team::class)->except(['show']);
        Route::resource('/admin/project', c_project::class)->except(['create','show','edit']);
    });
    Route::middleware(['userAkses:pegawai'])->group(function () {
        // Pegawai
        Route::get('/pegawai',[AdminController::class,'pegawai'])->middleware('userAkses:pegawai')->name('dashboard.pegawai');
        Route::get('/pegawai/project', function () {
            return view('pegawai.project.index');
        });
        // Route::get('/pegawai/project/{id_project}',function () {
        //     return view('pegawai.project.index');
        // });
    });
    Route::get('/logout',[SesiController::class,'logout'])->name("Logout");
});

