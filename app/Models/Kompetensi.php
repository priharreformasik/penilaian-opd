<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    use HasFactory;
    protected $table = 'kompetensi';
    public $timestamps = false;
    protected $primaryKey = 'kompetensi_id';
    
    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
