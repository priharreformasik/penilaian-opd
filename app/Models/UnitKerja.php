<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table = 'unit_kerja';    
    protected $primaryKey = 'unitkerja_kode';

    public function instansi(){
        return $this->BelongsTo(Instansi::class,'instansi_kode');
    }

    public function satker(){
        //setiap satker memiliki satu unit
        return $this->hasMany(Satker::class);
    }

    public function user(){
        //setiap user memiliki satu unit
        return $this->hasMany(User::class);
    }
}
