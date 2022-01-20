<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        // dd($request->all);
        $this->validate($request, [
            'nip' => 'required',
            'password' => 'required',
        ]);
        $keypass ="bkdkp!v2";
        $user = User::where('pegawai_nip_baru', $request->nip)
                    ->where('pegawai_password',md5($keypass.str_replace(" ","",$request->password)))
                    ->first();
                    // dd($user);
        if ($user) {
            Auth::login($user);
            return redirect()->route('beranda');
        } else {
            return back()->withErrors([
                'nip' => 'salah.',
            ]);
        }
    } 

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    } 
}
