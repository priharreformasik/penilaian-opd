<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    use HasFactory;
    protected $table = 'keluarga';
    public $timestamps = false;
    protected $primaryKey = 'keluarga_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }

    public function status_keluarga(){
        return $this->BelongsTo(StatusKeluarga::class,'statkel_kode');
    }
}
