@extends('Dashboard.layout.main')
@section('container')
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

        @foreach ($bantuan as $item)
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
{{-- <div class="d-flex justify-content-center">
    {{ $bantuan->links() }}
</div> --}}
@endsection