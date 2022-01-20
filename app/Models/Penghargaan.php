<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penghargaan extends Model
{
    use HasFactory;
    protected $table = 'penghargaan';
    public $timestamps = false;
    protected $primaryKey = 'penghargaan_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
