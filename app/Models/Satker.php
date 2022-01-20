<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;
    protected $table = 'satuan_kerja';    
    protected $primaryKey = 'satker_kode';

    public function unit_kerja(){
        return $this->BelongsTo(UnitKerja::class,'unitkerja_kode');
    }

    public function user(){
        //setiap user memiliki satu satker
        return $this->hasMany(User::class);
    }
}
