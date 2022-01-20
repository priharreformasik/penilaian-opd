<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    protected $table = 'instansi';    
    protected $primaryKey = 'instansi_kode';

    protected $fillable = [
        'instansi_kode',
        'instansi_nama',
    ];

    public function user(){
        //setiap user memiliki satu instansi
        return $this->hasMany(User::class);
    }

    public function unit_kerja(){
        //setiap unit memiliki satu instansi
        return $this->hasMany(UnitKerja::class);
    }
}
