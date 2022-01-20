<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatJabatan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_jabatan';
    public $timestamps = false;
    protected $primaryKey = 'rjabatan_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }

    public function jabatan(){
        return $this->BelongsTo(Jabatan::class,'jabatan_kode');
    }


}
