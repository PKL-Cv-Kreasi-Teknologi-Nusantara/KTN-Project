<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
       return view('login');
    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=> 'required'
        ],[
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi'
        ]
        );
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            } elseif(Auth::user()->role == 'pegawai'){
                return redirect('/pegawai');
            }
           
        }else{
            return redirect('')->withErrors('Email atau Password salah')->withInput();
        };
     }
     function logout(){
        Auth::logout();
        return redirect('');
     }
}