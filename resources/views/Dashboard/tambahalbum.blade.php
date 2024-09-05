@extends('Dashboard.layout.main')
@section('container')
@include('Dashboard.partials.sessionhandle')
    <div class="container">
        <div class="border p-3 mb-2 shadow">
            <p class="text-center fw-bold m-0">Tambah foto</p>
            <form action="/dashboard/album" method="post" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Masukkan gambar</label>
                    <img class="text-center mb-2 text-center d-block m-auto" width="" src="" id="Gambar">
                    <input class="form-control gambar" type="file" id="formFileMultiple" multiple name="gambar" onchange="previewImage('Gambar','.gambar')" required>
                </div>
                <button class="btn btn-bluedark text-center">Tambahkan</button>
            </form>
        </div>

        <div class="row">
            @foreach ($album as $albums)
            <div class="col-sm-4 border px-0" style="height: 300px">
                    <form action="/dashboard/album/delete/{{$albums->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="confirmedHapus(event)" class="position-absolute btn mt-3 ms-3 btn-sm btn-danger rounded-circle bi bi-trash-fill" type="submit"></button>
                    </form>
                    <img class="" style="object-fit: cover" src="{{asset('storage/'.$albums->gambar) }}"
                    alt="" width="100%" height="100%">
                </div>
            @endforeach
        </div>
    </div>
@endsection
