<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use App\Models\Project;

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
            'project' => Project::count()
        ];
        return view('pegawai.index',$data_user);
    }
}
