<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesejahteraan extends Model
{
    use HasFactory;
    protected $table = 'kesejahteraan';
    public $timestamps = false;
    protected $primaryKey = 'kesejahteraan_id';

    public function user(){
        return $this->BelongsTo(User::class,'pegawai_nip');
    }
}
