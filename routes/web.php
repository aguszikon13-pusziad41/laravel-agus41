<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');

Route::get('/', function () {
    return view('front.home');
});

// CARA PERTAMA
Route::get('/halo', function (){
    return ('Halo Tampan Sekali');
});

// CARA KEDUA
Route::get('/kabar', function () { //kabar: url
    return view('kondisi'); //resources/views/kondisi.blade.php
});


//contoh routing menggunakan parameter
Route::get('staff/{nama}/{divisi}', function ($nama, $divisi) {
    return 'Nama Pegawai ' . $nama . '<br> Bidang: ' . $divisi;

});

Route::get('/daftar_nilai', function () {//daftar_nilai: url
    return view('nilai.daftar_nilai'); //resources/views/nilai/daftar_nilai.blade.php
});

//ini untuk memanggil dashboard admin dengan templete sbsadmin
Route::get('/dashboard', function () {//dashboard: url
    return view('admin.dashboard'); //resources/views/admin/dashboard.blade
});
