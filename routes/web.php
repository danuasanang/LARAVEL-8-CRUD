<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_coba;
use App\Http\Controllers\C_form;
use App\Http\Controllers\LoginController;

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
    return view('admin');
});

Route::get('/datapribadi/{nama}', function ($nama) {
    return "Nama saya:$nama";
});

Route::get('/datasiswa', function () {
    return view('datasiswa', [
        "siswa" => "Ahmad Abdul Azis",
        "nilai" => 75,
        "siswa1" => [
            "Ahmad",
            "Abdul",
            "Azis"
        ]

    ]);
});

// akses controller
Route::get('/siswa', [C_coba::class, 'index']);
Route::get('/data', [C_coba::class, 'datasiswa']);

// FORM
Route::get('/form', [C_form::class, 'index'])->name('form');
Route::post('/prosestambah', [C_form::class, 'prosesReg']);
Route::get('/hapus/{id}', [C_form::class, 'prosesDel']);
Route::post('/prosesedit', [C_form::class, 'prosesUpdate']);
Route::get('/login', [LoginController::class, 'index']);

