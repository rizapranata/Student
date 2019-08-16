<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = 'telepon';
    protected $primarykey = 'id_siswa';
    protected $fillable = ['id_siswa','no_telepon'];

    public function siswa(){
        return $this->belongsTo('App\Models\Student','$id_siswa');
    }
}
