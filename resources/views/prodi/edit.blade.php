@extends('layout.master')
@section('title', 'Halaman Edit Prodi')

@section('content')
<div class="row pt-4">
    <div class="col">
        <h2>Form Edit Prodi</h2>
        @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session()->get('info') }}
        </div>
        @endif
        <form action="{{ route('prodi.update', ['prodi' => $prodi->id]) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') ?? $prodi->nama }}">
                {{-- null coalescing operator --}}
                @error('nama')
                    <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Ubah</button>
        </form>
    </div>
</div>
@endsection