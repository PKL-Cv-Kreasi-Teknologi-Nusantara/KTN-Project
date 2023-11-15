<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class c_team extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'users' => User::where('id','!=','1')->get()
        ];
        return view("admin.team.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.team.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi request jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' =>'pegawai'
        ]);
        // Hash password sebelum menyimpannya ke database
        $validatedData['password'] = bcrypt($validatedData['password']);
        // Simpan data ke database
        User::create($validatedData);
        return redirect('/admin/team')->with('success', 'Pegawai berhasil di tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =[
            'user' => User::where('id',$id)->first()
        ];
        return view("admin.team.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    return redirect('/admin/team')->with('success', 'Data berhasil diubah.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);

        // Periksa apakah pengguna ditemukan
        if ($user) {
            // Hapus pengguna
            $user->delete();

            return response()->json(['message' => 'Data berhasil dihapus.']);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }
    }
}
