@extends('Dashboard.layout.main')
@section('container')
    <div class="container">
        <h3>Data mahasiswa</h3>
        <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#Formdatamahasiswa">Tambah Data</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- modal tambah data --}}
    <div class="modal" tabindex="-1" id="Formdatamahasiswa" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/dashboard/mahasiswa" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="nim" class="col-sm-4 col-form-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="nim" id="nik">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"name="nama" id="nama">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
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
@endsection
