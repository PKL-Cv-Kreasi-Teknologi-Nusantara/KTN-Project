<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        Auth::user()->role;
        return view('admin.index');
    }
    function pegawai(){
        return view('pegawai.index');
    }
}
