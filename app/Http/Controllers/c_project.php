<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Symfony\Contracts\Service\Attribute\Required;

class c_project extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Mendapatkan semua data proyek dari model Project
    $projects = Project::all();

    $data = [
        'projects' => $projects
    ];

    $data_user = [
        'nama'=> Auth::user()->name,
        'role'=> Auth::user()->role,
    ];

    // Mengirim data proyek dan data pengguna ke tampilan Blade
    return view("admin.project.index", compact('projects', 'data_user'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.project.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'nama_projects' => 'required',
        'client'=>'Required',
        'status' => 'required',
        'priority' => 'required',
        'deadline' => 'required|date',
        'description' => 'required'
    ]);

    
        // Simpan data ke dalam database
        Project::create($validatedData);
        return redirect('/admin/project')->with('success', 'project berhasil di tambahkan.');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $data = [
            'project' => Project::where('projects_id', $project)->first()
        ];
        return view("admin.project.show", $data);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $data =[
            'project' => Project::where('projects_id', $project)->first()
        ];
        return view("admin.project.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_projects' => 'required',
            'client'=>'Required',
            'status' => 'required',
            'priority' => 'required',
            'deadline' => 'required|date',
            'description' => 'required'
        ]);
        // Temukan pengguna berdasarkan ID
        $project = Project::where('projects_id', $project)->first();
        $project->update($validatedData);
        return redirect('/admin/project')->with('success', 'project berhasil di ubah.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        // Temukan pengguna berdasarkan ID
        $project = Project::where('projects_id', $project)->first();
        if ($project) {
            $project->delete();
            return response()->json(['message' => 'Data berhasil dihapus.']);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan.'], 404);
        }

    }
    public function pegawai()
{
    // Mendapatkan semua data proyek dari model Project
    $projects = Project::all();

    $data = [
        'projects' => $projects
    ];

    $data_user = [
        'nama'=> Auth::user()->name,
        'role'=> Auth::user()->role,
    ];

    // Mengirim data proyek dan data pengguna ke tampilan Blade
    return view("pegawai.project.index", compact('projects', 'data_user'));
}
}
