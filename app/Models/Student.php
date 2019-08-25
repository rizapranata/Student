<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tgl_lahir',
        'jenis_kelamin',
        'id_kelas'
    ];

    //untuk mengubah case dari database menjadi kapital/Title Case/CamelCase
    public function getNamaSiswaAtribute($nama_siswa)
    {
        return ucwords($nama_siswa);
    }

    //untuk mengubah case menjadi kapital/Title Case/CamelCase saat user inputkan nama dgn huruf kecil
    public function setNamaSiswaAtribute($nama_siswa)
    {
        return strtolower($nama_siswa);
    }

    public function telepon()
    {
        return $this->hasOne('App\Models\Telepon','id_siswa');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas', 'id_kelas');
    }
}
