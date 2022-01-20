<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Alert;
use Hash;
use DB;


class UserController extends Controller
{
    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function api_login(Request $request)
    {
        $this->validate($request, [
                    'nip' => 'required',
                    'password' => 'required',
                ]);
        $keypass ="bkdkp!v2";
        if(Auth::attempt(['pegawai_nip_baru', $request->nip, 'pegawai_password', md5($keypass.str_replace(" ","",$request->password))])){
            $user = Auth::user();
            // dd($user);
            $success['token'] =  $user->createToken('nApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
 

    public function logout(Request $request)
    {
        $logout = $request->user()->token()->revoke();
        if($logout){
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

   
    public function edit_password()
    {
        $data = User::find(Auth::user()->pegawai_nip);
        // dd($data);
        return view('reset_index',compact('data'));
    //print_r($data);
    }

    public function update_password(Request $request){
        $ubahPassword = User::find(Auth::user()->pegawai_nip);
        if(Hash::check($request->password_lama,$ubahPassword->pegawai_password)){
          if($request->password_baru == $request->konfirmasi){
            $keypass ="bkdkp!v2";
            $ubahPassword->pegawai_password = md5($keypass.str_replace(" ","",$request->konfirmasi));
            $this->validate($request, [
              'password_baru' => 'required|min:6',
              'konfirmasi' => 'required|min:6',
              'pegawai_password' => 'required|min:6',
            ],
            [
              'password_baru.required' => 'Password Baru tidak boleh kosong!',
              'password_baru.min' => 'Password Baru minimal 6 karakter',
              'konfirmasi.required' => 'Konfirmasi password tidak boleh kosong!',
              'konfirmasi.min' => 'Konfirmasi password minimal 6 karakter',
              'pegawai_password.required' => 'Password Lama tidak boleh kosong!',
              'pegawai_password.min' => 'Password Lama minimal 6 karakter',
  
            ]);
            $ubahPassword->save();
            // dd($userPassword);
            Alert::success('Berhasil!','Password Berhasil Diubah!');
            return redirect('home');
          }else{
            Alert::warning('Peringatan!','Password Baru & Konfirmasi Tidak Sama!');
            return redirect()->back();
          }
        }else{
            Alert::warning('Peringatan!','Password Lama Salah!');
            return redirect()->back();
        }
      }
}
