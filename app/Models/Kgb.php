<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kgb extends Model
{
    use HasFactory;    
    protected $table = 'kgb';
    public $timestamps = false;
    protected $primaryKey = 'kgb_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
