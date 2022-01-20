<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strata extends Model
{
    use HasFactory;
    protected $table = 'strata';
    public $timestamps = false;
    protected $primaryKey = 'strata_kode';    

    public function riwayat_pendidikan(){
        return $this->hasMany(RiwayatPendidikan::class);
    }
}
