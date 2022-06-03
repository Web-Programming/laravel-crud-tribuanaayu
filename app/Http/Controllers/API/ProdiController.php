<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        return $prodi;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        //$prodi->institusi_id = 0;
        //$prodi->fakultas_id = 1;
        $prodi->foto= $nama_file;
        $prodi->save(); //simpan ke dalam tabel prodis

        return['status' =>true, 'message' => 'Data berhasil disimpan'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prodi = Prodi::findOrFail($id);
        return $prodi;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20'
        ]);

        Prodi::where('id', $id)->update($validateData);

        return['status' =>true, 'message' => 'Data berhasil disimpan'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = Prodi::find($id);
        if($prodi){
            $prodi->delete();
            return ['status' =>true, 'message' => 'Data Prodi Berhasil Dihapus'];
        }else{
            return ['status' =>false, 'message' => 'Data Prodi Gagal Dihapus'];
        }
    }
}
