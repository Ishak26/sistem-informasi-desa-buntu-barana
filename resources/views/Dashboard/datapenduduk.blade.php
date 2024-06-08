@extends('Dashboard.layout.main')
@section('container')
    <style>
        .fs-7 {
            font-size: 12px;
        }
    </style>
    <div class="container">
        @if (session('hapus'))
            <script>alert('{{session('hapus')}}');</script>
        @endif
        <h2 class="my-3 text-center fw-bold">Daftar Data Penduduk</h2>
        <a href="/dashboard/formpenduduk"><button class="btn btn-sm  btn-primary float-start"><i class="bi bi-database-fill-add fs-4"></i></button></a>
        <form action="/dashboard/datapenduduk" method="get" class=" d-flex">
            <div class="input-group input-group-sm mb-3 w-50 m-auto ">
                <button class="btn btn-sm  btn-primary" type="submit">Cari</button>
                <input type="text" class="form-control" placeholder="Cari data Penduduk" name="filter">
            </div>
        </form>
        <table class="table ">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Dusun</th>
                    <th scope="col">-</th>
                </tr>
            </thead>
            <tbody>
                @if(session('sukses'))
                    <script>
                        alert("{{ session('sukses') }}");
                    </script>
                @endif

                @foreach ($penduduk as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->dusun }}</td>
                        <td class="d-flex">
                            <a href="#exampleModal{{ $item->nik }}" data-bs-toggle="modal" data-bs-target="">
                                <button class="btn btn-primary btn-sm">
                                    <span class="bi bi-info"></span>
                                </button>
                            </a>
                            <a href="/dashboard/datapenduduk/{{ $item->nik }}/updatependuduk" class="mx-1">
                                <button type="button" class="btn btn-success btn-sm">
                                   <span class="bi bi-pencil-square"></span>
                                </button>
                            </a>
                           <form action="/dashboard/datapenduduk/{{$item->nik}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <span class="bi bi-trash"></span>
                                </button>
                           </form>
                        </td>
                    </tr>
                    {{-- my modal view --}}
                    <div class="modal fade" id="exampleModal{{ $item->nik }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data {{ $item->nama }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">Nama </div>
                                        <div class="col-8">: {{ $item->nama }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Nik </div>
                                        <div class="col-8">: {{ $item->nik }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Jenis Kelamin </div>
                                        <div class="col-8">: {{ $item->jk }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Agama : </div>
                                        <div class="col-8">: {{ $item->agama }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Alamat </div>
                                        <div class="col-8">: {{ $item->alamat }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Tempat/tanggal lahir </div>
                                        <div class="col-8">:
                                            {{ $item->tempatlahir . ', ' . date('d F Y', strtotime($item->tanggalalahir)) }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Dusun </div>
                                        <div class="col-8">: {{ $item->dusun }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Email : </div>
                                        <div class="col-8">: {{ $item->email }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">No.handphone : </div>
                                        <div class="col-8">: {{ $item->hp }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Status : </div>
                                        <div class="col-8">: {{ $item->status }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Pendidikan terakhir </div>
                                        <div class="col-8">: {{ $item->pendidikan }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Asal sekolah </div>
                                        <div class="col-8">: {{ $item->namasekolah }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Pekerjaaan </div>
                                        <div class="col-8">: {{ $item->pekerjaan }} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">Penghasilan </div>
                                        <div class="col-8">: {{ $item->penghasilan }} </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $penduduk->links() }}
        </div>

    </div>
@endsection
