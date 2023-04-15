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
        <a href="/dashboard/formpenduduk"><button class="btn btn-sm  btn-primary float-start">Tambah Penduduk</button></a>
        <form action="/dashboard/datapenduduk" method="get" class=" d-flex">
            <div class="input-group input-group-sm mb-3 w-50 m-auto ">
                <button class="btn btn-sm  btn-primary" type="submit">Cari</button>
                <input type="text" class="form-control" placeholder="Cari data Penduduk" name="filter">
            </div>
        </form>
        <table class="table ">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Dusun</th>
                    <th scope="col">-</th>
                </tr>
            </thead>
            <tbody>
                @if (session('sukses'))
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </button>
                            </a>
                            <a href="/dashboard/datapenduduk/{{ $item->nik }}/updatependuduk" class="mx-1">
                                <button type="button" class="btn btn-success btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </a>
                           <form action="/dashboard/datapenduduk/{{$item->nik}}" method="post">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd"
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
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
