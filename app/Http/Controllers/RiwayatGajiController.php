<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gaji;

class RiwayatGajiController extends Controller
{
    public function gaji()
    {
      $user = Auth::user()->pegawai_nip;
      $gaji = Gaji::where('pegawai_nip', $user)->get();
      return view('pegawai.gaji',compact('gaji'));
    }
}
