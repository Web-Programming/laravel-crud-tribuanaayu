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
    return view('welcome');
});

Route::get("/dosen", function(){
    $kampus = "Universitas Multi Data Palembang";
    return view("dosen.index", compact('kampus'));
});

Route::get("/fakultas", function(){
    return view("fakultas.index", 
        ['ilkom' => 'Fakultas Ilmu Komputer dan Rekayasa',
        'feb' => "Fakultas Ekonomi dan Bisnis"]
    );
});

/*Route::get("/prodi", function(){
    $data = [
        'prodi' => ['Manajemen Informatika', 'Sistem Informasi', 'Informatika']
    ];

    //atau menggunakan compact
    $prodi = ['Manajemen Informatika', 'Sistem Informasi', 'Informatika'];
    $kampus = "Universitas Multi Data Palembang";

    return view("prodi.index", compact('prodi', 'kampus'));
})->name("prodi");*/

use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;

Route::get("/prodi", [ProdiController::class, "index"])->name("prodi");
Route::get("/prodi/detail/{id?}", [ProdiController::class, "detail"]);

Route::get("/mahasiswa", [MahasiswaController::class, "index"]);
Route::get("/mahasiswa/detail/{id}", [MahasiswaController::class, "detail"])->name('detailmhs');