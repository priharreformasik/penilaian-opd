<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiKerja extends Model
{
    use HasFactory;
    protected $table = 'prestasikerja';
    public $timestamps = false;
    protected $primaryKey = 'prestasikerja_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
