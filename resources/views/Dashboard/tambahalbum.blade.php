@extends('Dashboard.layout.main')
@section('container')
    <div class="container">
        <h3 class="text-center fw-bold">Album Desa XYZ</h1>
        <div class="col-sm-7 border p-3 shadow">
            <p class="text-center fw-bold m-0">Tambah foto</p>
            <form action="/dashboard/album" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Masukkan gambar</label>
                <img class="text-center mb-2 text-center d-block m-auto" width="" src="" id="Gambar">
                <input class="form-control gambar" type="file" id="formFileMultiple" multiple name="gambar" onchange="previewImage()" required>
                        {{-- <img class="text-content-center  text-center" src="{{ asset('storage/file-bukti-belanja/3q8TAT4ue3txAGEu3fZMCfXonl5gHqcrQLRLAoZS.jpg') }}"
                            alt="" width="100%" height="100%"> --}}
            </div>
            <button class="btn btn-primary text-center">Tambahkan</button>
        </form>
        </div>

        <div class="row ">
            @foreach ($album as $albums)
                <div class="col-md-4 mb-2 mt-3">
                    <div class="rounded border p-2 border-box shadow w-100 h-50">
                        <img class="text-content-center  text-center" src="{{ asset('storage/' . $albums->gambar) }}"
                            alt="" width="100%" height="100%">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="/js/javascript.js"></script>
@endsection
