<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'pegawai';
    public $timestamps = false;
    protected $primaryKey = 'pegawai_nip';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'pegawai_nip',
        'pegawai_nip_baru',
        'pegawai_password',
        'level',
        'pegawai_nama',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pegawai_password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function instansi(){
        return $this->BelongsTo(Instansi::class,'instansi_kode');
    }

    public function unit_kerja(){
        return $this->BelongsTo(UnitKerja::class,'unitkerja_kode');
    }

    public function satker(){
        return $this->BelongsTo(Satker::class,'satker_kode');
    }

    public function riwayat_pendidikan(){
        return $this->hasMany(RiwayatPendidikan::class);
    }

    public function keluarga(){
        return $this->hasMany(Keluarga::class);
    }

    public function riwayat_diklat(){
        return $this->hasMany(RiwayatDiklat::class);
    }

    public function riwayat_jabatan(){
        return $this->hasMany(RiwayatJabatan::class);
    }

    public function riwayat_golru(){
        return $this->hasMany(RiwayatGolru::class);
    }

    public function organisasi(){
        return $this->hasMany(Organisasi::class);
    }

    public function gaji(){
        return $this->hasMany(Gaji::class);
    }
    public function penghargaan(){
        return $this->hasMany(Penghargaan::class);
    }

    public function prestasikerja(){
        return $this->hasMany(PrestasiKerja::class);
    }

    public function kgb(){
        return $this->hasMany(Kgb::class);
    }
    
    public function kompetensi(){
        return $this->hasMany(Kompetensi::class);
    }
}
