<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
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

    // public function login(Request $request){
    //     $this->validate($request, [
    //         'nip' => 'required',
    //         'password' => 'required',
    //     ]);
    //     $user = User::where('pegawai_nip_baru', $request->nip)->where('pegawai_password',md5($request->password))->first();
        

    //     if ($user) {
    //         Auth::login($user);
    //         return redirect()->route('home');
    //     } else {
    //         return back()->withErrors([
    //             'nip' => 'salah.',
    //         ]);
    //     }
    // }

    
}
