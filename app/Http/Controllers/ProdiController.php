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

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
            'foto' => 'required|file|image|max:1000'
        ]);

        //mengambil file extension
        $ext = $request->foto->getClientOriginalExtension();
        //menentukan nama file
        $nama_file =  "foto-" . time() . "." . $ext;
        $path = $request->foto->storeAs("public", $nama_file);

        $prodi = new Prodi(); //buat object prodi
        $prodi->nama = $validateData['nama']; //simpan nilai inout ($validateData['nama]) ke dalam property nama prodi ($prodi->nama)
        $prodi->institusi_id = 0;
        $prodi->fakultas_id = 1;
        $prodi->foto= $nama_file;
        $prodi->save(); //simpan ke dalam tabel prodis

        //return "Data prodi $prodi->nama berhasil disimpan ke database"; // tampilkan pesan berhasil
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan ke database");
        return redirect()->route('prodi.create');
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show', ['prodi' => $prodi]);
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', ['prodi' => $prodi]);
    }

    public function update(Request $request, Prodi $prodi)
    {
     
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);

        Prodi::where('id', $prodi->id)->update($validateData);
        $request->session()->flash('info', "Data prodi $prodi->nama berhasil diubah");
        return redirect()->route('prodi.index');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with("info", "Prodi $prodi->nama berhasil dihapus.");
    }
}
