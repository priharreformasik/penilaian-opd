<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;
use App\Models\UnitKerja;
use App\Models\Satker;
use QrCode;

class JabatanController extends Controller
{
    public function index()
    {
        $instansi = Instansi::all();
        $unitkerja = UnitKerja::all();
        $satker = Satker::all();

        return view('qrcode', compact('instansi','unitkerja','satker'));
    }

    public function generate(Request $request)
    {
        $qr = QrCode::size(300)->generate($request->satker);
        return response($qr);

    }
}
