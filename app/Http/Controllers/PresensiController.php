<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PresensiController extends Controller
{
    public function presensi()
    {
        return view('pegawai.presensi');
    }
}
