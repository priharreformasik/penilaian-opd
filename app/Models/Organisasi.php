<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    protected $table = 'organisasi';
    public $timestamps = false;
    protected $primaryKey = 'organisasi_id';
    
    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
