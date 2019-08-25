<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'Kelas';

    protected $fillable = ['nama_kelas'];

    public function siswa()
    {
        return $this->hasMany('App\Models\Student', 'id_kelas');
    }
}
