<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;
    
    protected $table = 'riwayat_pendidikan';
    public $timestamps = false;
    protected $primaryKey = 'rpendidikan_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }

    public function strata(){
        return $this->BelongsTo(Strata::class,'strata_kode');
    }
}
