<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'siswa';
    protected $fillable = [
        'id_kelas', 'nama', 'nisn', 'alamat', 'peminatan', 'ekskul'
    ];
}
