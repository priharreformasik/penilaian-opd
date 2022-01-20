<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKeluarga extends Model
{
    use HasFactory;
    protected $table = 'status_keluarga';
    public $timestamps = false;
    protected $primaryKey = 'statkel_kode';

    public function keluarga(){
        return $this->hasMany(Keluarga::class);
    }
}
