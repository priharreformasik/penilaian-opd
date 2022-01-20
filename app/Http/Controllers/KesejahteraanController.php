<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kesejahteraan;
use DataTables;

class KesejahteraanController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax()) {
            $user = Auth::user()->pegawai_nip;
            return datatables()->of(Kesejahteraan::where('pegawai_nip', $user)->get());
        }
        if( $request->ajax() ){
            return new ContactCollection(auth()->user()->contacts()->latest()->paginate($request->length));
        }
        return view('pegawai.kesejahteraan_ajax');
        // $data = User::where('pegawai_nip',800001218)->get();
        // dd($data);
    }
}
