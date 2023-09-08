<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('Login');
});
Route::get('/dashboard', function () {
    return view('admin.index');
});
Route::get('/team', function () {
    return view('admin.team.index');
});
Route::get('/project', function () {
    return view('admin.project.index');
});
