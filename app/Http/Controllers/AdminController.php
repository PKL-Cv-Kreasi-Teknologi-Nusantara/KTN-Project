<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $data_user = [
            'nama'=> Auth::user()->name,
            'role'=> Auth::user()->role,
        ];
        return view('admin.index', $data_user);
    }
    function pegawai(){
        $data_user = [
            'nama'=> Auth::user()->name,
            'role'=> Auth::user()->role,
        ];
        return view('pegawai.index',$data_user);
    }
}
