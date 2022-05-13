{{-- @include("layout.header", ['title' => "Halaman Program Studi"]) --}}

@extends("layout.master")
@section("title", "Halaman Program Studi")

@section("content")
    <div class="row pt-4">
        <div class="col">            
            <h1>Program Studi</h1>
            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah</a>
            </div>
            @if (session()->has('info'))
                <div class="alert alert-success">
                    {{ session()->get('info')}}
                </div>
            @endif
            <div>
                <table class="table table-striped table-hover">
                    <thread>
                        <tr>
                            <th>Nama</th>
                            <th>Fakultas</a>
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thread>
                    <tbody>
                    @foreach($prodi as $item)
                        <tr>
                            <td> {{ $item->nama }} </td>
                            <td> {{ $item->fakultas->nama }} </td>
                            <td> <img src="{{ asset('storage/'.$item->foto) }}" width="100"> </td>
                            <td>
                                <form action="{{ route('prodi.destroy', ['prodi' => $item->id]) }}" method="POST">
                                    <a href="{{ url('/prodi/'.$item->id) }}" class="btn btn-warning">Detail</a>
                                    <a href="{{ url('/prodi/'.$item->id.'/edit') }}" class="btn btn-info">Ubah</a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        {{-- <li>{{ $item->nama }} {{ $item->fakultas->nama }}</li> --}}
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
