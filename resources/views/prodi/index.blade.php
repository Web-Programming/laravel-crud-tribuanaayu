{{-- @include("layout.header", ['title' => "Halaman Program Studi"]) --}}

@extends("layout.master")
@section("title", "Halaman Program Studi")

@section("content")
    <h1>Program Studi</h1>
    @if(count($prodi) > 0 )
        @foreach($prodi as $item)
            <li>{{ $item->nama }} {{ $item->fakultas->nama }}</li>
        @endforeach
    @else
        Program Studi tidak ditemukan
    @endif
@endsection

{{-- @include("layout.footer") --}}