@extends('Dashboard.layout.main')
@section('container')
    <style>
        html,
        body,
        p {
            margin: 0%;
            padding: 0;
        }

        .cards {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            color: white;
        }

        .card-title small {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 8px;
            margin: 3px;

        }

        .card-list {
            width: 200px;
            height: 200px;
            display: flex;
            background-color: blue;
            border-radius: 5px;
            box-shadow: 20px;
            margin: 30px;
            line-height: 25px;
        }

        .body {
            font-size: 25px;
            margin: auto;
            text-align: center;
            gap: 30px;
        }
    </style>
    @if (session('edit'))
        <script>
            alert('{{ session('edit') }}');
        </script>
    @endif
    <div class="container">
        <div class="cards">
            <div class="card-list shadow">
                <div class="card-title">
                    <small>Jumlah Penduduk</small>
                </div>
                <div class="body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>
                    <p>{{ $penduduk->count() }}</p>
                    <small class="fs-5">Orang</small>
                </div>
            </div>
            <div class="card-list bg-danger">
                <div class="card-title">
                    <small>Jumlah Aparat Desa</small>
                </div>
                <div class="body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>
                    <p>{{ $pegawai->count() }}</p>
                    <small class="fs-5">Orang</small>
                </div>
            </div>
            <div class="card-list  bg-warning">
                <div class="card-title">
                    <small>laki-laki</small>
                </div>
                <div class="body">
                    <p>{{ $lakilaki->count() }}</p>
                    <small class="fs-5">Orang</small>
                </div>
            </div>
            <div class="card-list bg-success">
                <div class="card-title">
                    <small>Jumlah Postingan Berita</small>
                </div>
                <div class="body">
                    <p>{{ $berita->count() }}</p>
                    <small class="fs-5">Orang</small>
                </div>
            </div>
        </div>

        {{-- <div class="m-auto">
            <div class="text-center float-start">
                <img src="img/no-profil.jpg" class="img-fluid me-4" width="300" height="350" alt="">
                <small class="d-block">dr xyz M.ms</small>
                <p>Kepala Desa XYZ</p>
            </div>
            <p class="fs-5 fw-semi-bold mb-1">Visi</p>
            <small class="lh-sm text-muted">MEWUJUDKAN DESA CILEUNYI KULON LEBIH MAJU, MANDIRI DAN RELIGIUS MELALUI
                PEMBANGUNAN PARTISIPATIF DAN TATA KELOLA PEMERINTAHAN YANG BAIK</small>
            <p class="fs-5 fw-semi-bold mb-1">Misi</p>
            <ul class="text-muted ms-3">
                <li> Meningkatkan pembangunan infrastruktur pedesaaan secara partisipatif</li>
                <li> Meningkatkan akuntabilitas pemerintahan dan optimalisasi pelayanan publik</li>
                <li> Meningkatkan pengembangan usaha ekonomi produktif masyarakat</li>
                <li>Meningkatkan kesejahteraan sosial masyarakat</li>
                <li> Meningkatkan kualitas dan perluasan layanan kesehatan dan pendidikan anak</li>
                <li> Memelihara nilai-nilai agama, sosial dan budaya masyarakat</li>
            </ul>
        </div> --}}


        <div class="m-auto">
            <div class="text-center float-start">
                {{-- <img src="img/{{ $kades->foto }}" class="img-fluid me-4" width="300" height="350" alt=""> --}}
                <img src="{{ asset('storage/' . $kades->foto) }}" class="img-fluid me-4" width="300" height="350"
                    alt="">
                <small class="d-block">{{ $kades->nama }}</small>
                <p>Kepala Desa XYZ</p>
            </div>
            <p class="fs-5 fw-semi-bold mb-1">Visi</p>
            <small class="lh-sm text-muted">{{ $kades->visi }}</small>
            <p class="fs-5 fw-semi-bold mb-1">Misi</p>
            <ul class="text-muted ms-3">
                @php
                    $visi = explode(',', $kades->misi);
                    foreach ($visi as $key) {
                        echo "<li> $key </li>";
                    }
                @endphp
            </ul>
            <a href="" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#Formdata">ubah profil</a>
        </div>

        {{-- modal tambah data --}}
        <div class="modal" tabindex="-1" id="Formdata" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit profil Kepala Desa</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/editkades/{{ $kades->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3 row">
                                <label for="formFile" class="col-sm-4 form-label">foto</label>
                                <div class="col-sm-8">
                                    <input name="foto" class="form-control" type="file" id="formFile">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="{{ $kades->nama }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="visi" class="col-sm-4 col-form-label">Visi</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="visi"
                                        name="visi"value="{{ $kades->visi }}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="exampleFormControlTextarea1" class="col-sm-4  form-label">Misi</label>
                                <div class="col-sm-8">
                                    <textarea name="misi" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{ $kades->misi }}</textarea>
                                    <small class="text-muted">Pisahkan Poin Misi dengan tanda koma.</small>
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
