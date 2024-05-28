@extends('Dashboard.layout.main')
@section('container')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="header text-center">
            <h3 class="fs-semibold mt-3">Daftar Pegawai Pemerintah Desa</h3>
        </div>
        <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#Formdata">Tambah Data</a>
        <div class="table-responsive-sm">
            <table class="table text-center" cellpaddding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Nomor Telpon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datapegawai as $item)
                        <tr class="">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->bidang }}</td>
                            <td>+62-{{ $item->hp }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->tanggallahir }}</td>
                            <td>{{ $item->jeniskelamin }}</td>
                            <td class="d-flex text-center">
                                <a href="" class="btn btn-warning btn-sm mx-1" data-bs-toggle="modal"
                                    data-bs-target="#editdata{{ $item->nik }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <form action="/dashboard/pemerintah/{{ $item->nik }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a type="submit" class="btn btn-sm btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </a>
                                </form>
                            </td>
                        </tr>

                        {{-- modal edit data --}}
                        <div class="modal" tabindex="-1" id="editdata{{ $item->nik }}"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Data Pegawai</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/dashboard/pemerintah/{{ $item->nik }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3 row">
                                                <label for="nik" class="col-sm-4 col-form-label">Nik</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="nik"
                                                        id="nik"value="{{ $item->nik }}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control"name="nama" id="nama"
                                                        value="{{ $item->nama }}">
                                                </div>
                                            </div>
                                            <div class="mb-3
                                                        row">
                                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                                {{-- <div class="col-sm-8">
                                                    <select class="form-select" id="jabatan" name="id_jabatan">
                                                        @foreach (session(jabatan) as $data)
                                                            <option value="{{$data->id }}"
                                                                {{( $data->id == $item->id_jabatan)? 'selected' : '' }}>
                                                                {{ $data->jabatan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                            </div>
                                            <div class="mb-3 row">
                                                <label for="hp" class="col-sm-4 col-form-label">Nomor
                                                    Hanphone</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="hp" id="hp"
                                                        value="{{ $item->hp }}">
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3
                                                            row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alamat"
                                                        name="alamat" value="{{ $item->alamat }}">
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3
                                                                row">
                                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="taggallahir"
                                                        name="tanggallahir" value="{{ $item->tanggallahir }}"S>
                                                </div>
                                            </div>
                                            <div
                                                class="mb-3
                                                                    row">
                                                <label for="jk" class="col-sm-4 col-form-label">Jenis
                                                    Kelamin</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        value="laki-laki"
                                                        {{ $item->jeniskelamin == 'laki-laki' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Laki-laki
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                                        value="perempuan"
                                                        {{ $item->jeniskelamin == 'perempuan' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Perempuan
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- akhir edit modal --}}
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- modal tambah data --}}
        <div class="modal" tabindex="-1" id="Formdata" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Pegawai</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/pemerintah" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-4 col-form-label">Nik</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nik" id="nik">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"name="nama" id="nama">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                {{-- <div class="col-sm-8">
                                    <select class="form-select" id="jabatan" name="id_jabatan">
                                        <option selected>--Pilih--</option>
                                        @foreach ($jabatan as $data)
                                            <option value="{{ $data->id }}">{{ $data->jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div>
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-4 col-form-label">Nomor Hanphone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="hp" id="hp">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="taggallahir" name="tanggallahir">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="laki-laki">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="perempuan">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                    </label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            {{-- Akhir modal --}}
        </div>
        {{-- akhir modal tambah data --}}

        {{-- cek tombol --}}
        @if (session('sukses'))
            <script>
                alert('{{ session('sukses') }}');
            </script>
        @endif
        @if (session('hapus'))
            <script>
                alert('{{ session('hapus') }}');
            </script>
        @endif
        @if (session('edit'))
            <script>
                alert('{{ session('edit') }}');
            </script>
        @endif

    @endsection
