<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('penilai.login');
})->name('login');
Route::post('postlogin', [App\Http\Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth','ceklevel:bkpp'])->group(function () {
    Route::get('/input-bkpp', function () {
        return view('bkpp.input');
    })->name('input-bkpp');  
});

Route::group(['middleware' => ['auth','ceklevel:bkpp,bkad']], function(){
    Route::get('/beranda', function () {
        return view('beranda');
    })->name('beranda');
    Route::get('/input-bkad', function () {
        return view('bkad.input');
    })->name('input-bkad');   
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/beranda', function () {
//         return view('beranda');
//     })->name('beranda');
//     Route::get('/input-bkad', function () {
//         return view('bkad.input');
//     })->name('input-bkad');
//     Route::get('/input-bkpp', function () {
//         return view('bkpp.input');
//     })->name('input-bkpp');  
// });




// Route::group(['middleware' => ['auth','Ceklevel:bkpp']], function(){
//     Route::get('/input-bkpp', function () {
//         return view('bkpp.input');
//     })->name('input-bkpp');   
// });
