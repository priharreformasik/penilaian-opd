<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golru extends Model
{
    use HasFactory;
    protected $table = 'golru';
    public $timestamps = false;
    protected $primaryKey = 'golru_kode';

    public function riwayat_golru(){
        return $this->hasMany(RiwayatGolru::class);
    }
}
