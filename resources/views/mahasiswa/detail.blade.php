@extends("layout.master")
@section("title", "Halaman Detail Mahasiswa")

@section("content")
    <h1>Detail Mahasiswa</h1>
    @if($mahasiswa)
        Nama : {{ $mahasiswa->nama }}<br/>
        NPM : {{ $mahasiswa->npm }}<br/>
        Alamat : {{ $mahasiswa->alamat }}<br/>
        Tanggal Lahir : {{ $mahasiswa->tanggal_lahir }}<br/>
    @else
        Mahasiswa tidak ditemukan
    @endif
@endsection