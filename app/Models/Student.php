<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tgl_lahir',
        'jenis_kelamin'
    ];
}
