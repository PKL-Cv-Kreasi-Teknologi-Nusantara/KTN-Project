<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'projects_id';
    protected $fillable = [
        'nama_projects', // tambahkan kolom 'nama_projects' di sini
        'client',
        'status',
        'priority',
        'deadline',
        'description'
        
        // tambahkan kolom-kolom lain yang dapat diisi secara massal di sini
    ];
}
