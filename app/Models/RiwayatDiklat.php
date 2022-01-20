<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiklat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_diklat';
    public $timestamps = false;
    protected $primaryKey = 'rdiklat_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
