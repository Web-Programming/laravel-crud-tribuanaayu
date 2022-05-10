<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{

    function index(){
    
        $kampus = "Universitas Multi Data Palembang";
        $prodi = Prodi::all();
        return view('prodi.index')->with('prodi', $prodi);
    }

    function detail($id = null){
        echo $id;
    }

    function create(){
        return view("prodi.create");
    }

    
}
