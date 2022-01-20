<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatGolru extends Model
{
    use HasFactory;

    protected $table = 'riwayat_golru';
    public $timestamps = false;
    protected $primaryKey = 'rgolru_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }

    public function golru(){
        return $this->BelongsTo(Golru::class,'golru_kode');
    }
}
