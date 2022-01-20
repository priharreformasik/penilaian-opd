<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Instansi;
use App\Models\RiwayatPendidikan;
use App\Models\RiwayatDiklat;
use App\Models\RiwayatGolru;
use App\Models\RiwayatJabatan;
use App\Models\Keluarga;
use App\Models\Strata;
use App\Models\Golru;
use App\Models\StatusKeluarga;
use App\Models\Gaji;
use App\Models\Organisasi;
use App\Models\PrestasiKerja;
use App\Models\Kgb;
use App\Models\Penghargaan;
use App\Models\Kompetensi;
use App\Models\Kesejahteraan;

class PegawaiController extends Controller
{
    public function pegawaishow($pegawai_nip)
    {
      $data = User::find($pegawai_nip);
      return view('pegawai.index',compact('data'));
    }

    public function show()
    {
      $data = Auth::user();
      // dd($data);
      return view('pegawai.index',compact('data'));
    }

    public function updateProfil(Request $request, $pegawai_nip)
    {
      $this->validate(request(),
        [
          'name' => 'required',
          'nip' => 'required',
          'instansi_kode' => 'required',
          'picture' => 'max:2048|mimes:png,jpg,jpeg',
        ]
      );

      $user = User::find($pegawai_nip);

      if(!empty($request->pegawai_foto)){
        $file = $request->file('pegawai_foto');
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = uniqid() . '.' . $extension;
        \Storage::delete('public/images/' . $user->pegawai_foto);
        \Storage::put('public/images/' . $filename, \File::get($file));
      } else {
        $filename = $user->pegawai_foto;
      }

      $user->pegawai_nama = $request->pegawai_nama;
      $user->pegawai_nip_baru = $request->pegawai_nip_baru;
      $user->instansi_kode = $request->instansi_kode;
      if ($request->pegawai_password) {
        $user->pegawai_password = \Hash::make($request->pegawai_password);
      }
      $user->pegawai_foto = $filename;
      $user->save();
      return redirect()->route('pegawai.index',$pegawai_nip);
    }

    public function pendidikan(Request $request)
    {
      // $pendidikan = User::with('riwayat_pendidikan')->find(Auth::user());  
      $user = Auth::user()->pegawai_nip;
      $pendidikan = RiwayatPendidikan::where('pegawai_nip', $user)->orderBy('strata_kode')->get();
      // dd($pendidikan);
      return view('pegawai.pendidikan',compact('pendidikan'));    
    }

    public function keluarga()
    {
      $user = Auth::user()->pegawai_nip;
      $keluarga = Keluarga::where('pegawai_nip', $user)->get();
      return view('pegawai.keluarga',compact('keluarga'));
    }

    public function diklat()
    {
      $user = Auth::user()->pegawai_nip;
      $diklat = RiwayatDiklat::where('pegawai_nip', $user)->get();
      return view('pegawai.diklat',compact('diklat'));
    }

    public function jabatan()
    {
      $user = Auth::user()->pegawai_nip;
      $jabatan = RiwayatJabatan::where('pegawai_nip', $user)->get();
      return view('pegawai.jabatan',compact('jabatan'));
    }

    public function golru()
    {
      $user = Auth::user()->pegawai_nip;
      $golru = RiwayatGolru::where('pegawai_nip', $user)->get();
      return view('pegawai.golru',compact('golru'));
    }

    public function penghargaan()
    {
      $user = Auth::user()->pegawai_nip;
      $penghargaan = Penghargaan::where('pegawai_nip', $user)->get();
      return view('pegawai.penghargaan',compact('penghargaan'));
    }

    public function gaji()
    {
      $user = Auth::user()->pegawai_nip;
      $gaji = Gaji::where('pegawai_nip', $user)->get();
      return view('pegawai.gaji',compact('gaji'));
    }
    public function kgb()
    {
      $user = Auth::user()->pegawai_nip;
      $kgb = Kgb::where('pegawai_nip', $user)->get();
      return view('pegawai.kgb',compact('kgb'));
    }
    public function organisasi()
    {
      $user = Auth::user()->pegawai_nip;
      $organisasi = Organisasi::where('pegawai_nip', $user)->get();
      return view('pegawai.organisasi',compact('organisasi'));
    }

    public function prestasi()
    {
      $user = Auth::user()->pegawai_nip;
      $prestasi = PrestasiKerja::where('pegawai_nip', $user)->get();
      return view('pegawai.prestasi',compact('prestasi'));
    }
    
    public function kompetensi()
    {
      $user = Auth::user()->pegawai_nip;
      $kompetensi = Kompetensi::where('pegawai_nip', $user)->get();
      return view('pegawai.kompetensi',compact('kompetensi'));
    }

    public function kesejahteraan()
    {
      $user = Auth::user()->pegawai_nip;
      $kesejahteraan = Kesejahteraan::where('pegawai_nip', $user)->get();
      return view('pegawai.kesejahteraan',compact('kesejahteraan'));
    }
}