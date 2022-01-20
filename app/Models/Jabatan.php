<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    public $timestamps = false;
    protected $primaryKey = 'jabatan_kode';
    

    public function riwayat_jabatan(){
        return $this->hasMany(RiwayatJabatan::class);
    }
}