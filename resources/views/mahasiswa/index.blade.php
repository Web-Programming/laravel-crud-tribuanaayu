@extends("layout.master")
@section("title", "Halaman Mahasiswa")

@section("content")
    <h1>Mahasiswa</h1>
    @if(count($mahasiswa) > 0 )
        @foreach($mahasiswa as $item)
            <li>
                Nama : {{ $item->nama }}<br/>
                NPM : {{ $item->npm }}<br/>
                Alamat : {{ $item->alamat }}<br/>
                Tanggal Lahir : {{ $item->tanggal_lahir }}<br/>
                <a href="{{route('detailmhs', [$item->id])}}">Detail</a>
            </li>
        @endforeach
    @else
        Mahasiswa tidak ditemukan
    @endif
@endsection