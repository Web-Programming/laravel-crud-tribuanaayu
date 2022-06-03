<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Program Studi
        </h2>
    </x-slot>
    <div class="row pt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="col">            
            <h1>Program Studi</h1>
            <div class="d-md-flex justify-content-md-end">
                @can("create",  App\Models\Prodi::class)
                <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah</a>
                @endcan
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
                            <!--<th>Fakultas</a>-->
                            <th>Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thread>
                    <tbody>
                    @foreach($prodi as $item)
                        <tr>
                            <td> {{ $item->nama }} </td>
                            <!--<td> {{-- $item->fakultas->nama --}} </td>-->
                            <td> <img src="{{ asset('storage/'.$item->foto) }}" width="100"> </td>
                            <td>
                                <form action="{{ route('prodi.destroy', ['prodi' => $item->id]) }}" method="POST">
                                    <a href="{{ url('/prodi/'.$item->id) }}" class="btn btn-warning">Detail</a>
                                    @can("update", $item)
                                    <a href="{{ url('/prodi/'.$item->id.'/edit') }}" class="btn btn-info">Ubah</a>
                                    @endcan

                                    @method('DELETE')
                                    @csrf

                                    @can("delete", $item)
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                    @endcan
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
</x-app-layout>