<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gaji';
    public $timestamps = false;
    protected $primaryKey = 'gaji_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
