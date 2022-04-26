<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    function index(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index", compact('kampus', 'mahasiswa'));
    }

    function detail($id = null){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::find($id);
        return view("mahasiswa.detail", compact('kampus', 'mahasiswa'));
    }
}
