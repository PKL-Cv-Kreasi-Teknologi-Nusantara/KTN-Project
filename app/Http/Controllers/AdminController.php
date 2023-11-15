<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    function index(){
        $data_user = [
            'nama'=> Auth::user()->name,
            'role'=> Auth::user()->role,
            'user' => User::where('role','!=','admin')->count(),
            'project' => Project::count(),
            'completed' => Project::where('status','Completed')->count(),
            'inprogress' => Project::where('status','inprogress')->count()
        ];
        return view('admin.index', $data_user);
    }
    function pegawai(){
        $data_user = [
            'nama'=> Auth::user()->name,
            'role'=> Auth::user()->role,
            'project' => Project::count(),
            'completed' => Project::where('status','Completed')->count(),
            'inprogress' => Project::where('status','inprogress')->count()
        ];
        return view('pegawai.index',$data_user);
    }
    function profile(){
        $data =[
            'user' => User::where('id',Auth::user()->id)->first()
        ];
        if(Auth::user()->role == 'admin'){
            return view('admin.profile',$data);
        }
        else{
            return view('pegawai.profile',$data);
        }
    }
    public function update(Request $request, $id)
{
    // Validasi request jika diperlukan
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable', // password bisa diisi atau tidak
    ]);

    // Dapatkan pengguna berdasarkan parameter $id
    $user = User::find($id);

    // Buat array untuk menyimpan kolom yang akan diperbarui
    $updateData = [
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
    ];

    // Periksa apakah password diisi
    if ($request->filled('password')) {
        // Hash password dan tambahkan ke array
        $updateData['password'] = Hash::make($validatedData['password']);
    }

    // Perbarui informasi pengguna
    $user->update($updateData);

    return redirect('/admin')->with('success', 'Profile berhasil diubah.');
}
public function update_pegawai(Request $request, $id)
{
    // Validasi request jika diperlukan
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'nullable', // password bisa diisi atau tidak
    ]);

    // Dapatkan pengguna berdasarkan parameter $id
    $user = User::find($id);

    // Buat array untuk menyimpan kolom yang akan diperbarui
    $updateData = [
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
    ];

    // Periksa apakah password diisi
    if ($request->filled('password')) {
        // Hash password dan tambahkan ke array
        $updateData['password'] = Hash::make($validatedData['password']);
    }

    // Perbarui informasi pengguna
    $user->update($updateData);

    return redirect('/pegawai')->with('success', 'Profile berhasil diubah.');
}
}
