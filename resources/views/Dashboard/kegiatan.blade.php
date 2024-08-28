@extends('dashboard.layout.main')
@section('container')
@include('dashboard.partials.sessionHandle')
    <div class="container">
      <h3 class="fs-4 text-bold text-center">Kegiatan</h3>
      <a class="bi bi-database-fill btn btn-sm btn-bluedark" data-bs-toggle="modal" data-bs-target="#modalPengumuman"></a>
    </div>

    <table class="table">
      <tr>
        <th scope="col">No</th>
        @foreach ($fieldTable as $item)
          <th scope="col">{{$item}}</th>
        @endforeach
        <th scope="col">-</th>
      </tr>
      @foreach ($datas as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>
              <img src="{{asset('./storage/'.$item->gambar)}}" alt="" width="50" height="50">
            </td>
            <td>{{$item->perihal}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{$item->jam}}</td>
            <td>{{$item->tempat}}</td>
            <td>
              <form action="/dashboard/hapuskegiatan/{{$item->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
      @endforeach
    </table>

    {{-- membuat modal kegiatan --}}
    <div class="modal" id="modalPengumuman">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Tambah Kegiatan</h4>
            <button class="btn btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form action="/dashboard/tambahkegiatan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row g-3">
                  <div class="col-4">
                    <label for="perihal col-form-label">Perihal</label>
                  </div>
                  <div class="col-8">
                    <img class="object-fit" src="" alt="" id="gambarKegiatan">
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar" placeholder="Perihal kegiatan" onchange="previewImage('gambarKegiatan','#gambar')" value="{{old('gambar')}}">
                  </div>
                  <div class="col-4">
                    <label for="perihal col-form-label">Perihal</label>
                  </div>
                  <div class="col-8">
                    <input class="form-control @error('perihal') is-invalid @enderror" type="text" name="perihal" id="perihal" placeholder="Perihal kegiatan" value="{{old('perihal')}}">
                  </div>

                  <div class="col-4">
                    <label for="perihal col-form-label">tanggal</label>
                  </div>
                  <div class="col-8">
                    <input class="form-control @error('waktu') is-invalid @enderror" type="date" name="tanggal" id="tanggal" value="{{old('waktu')}}">
                  </div>

                  <div class="col-4">
                    <label for="perihal col-form-label">jam</label>
                  </div>
                  <div class="col-8">
                    <input class="form-control @error('jam') is-invalid @enderror" type="time" name="jam" id="jam" value="{{old('jam')}}">
                  </div>

                  <div class="col-4">
                    <label for="perihal col-form-label">Tempat</label>
                  </div>
                  <div class="col-8">
                    <input class="form-control @error('tempat') is-invalid @enderror" type="text" name="tempat" id="tempat" placeholder="Tempat kegiatan" value="{{old('tempat')}}">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">tutup</button>
              <button class="btn btn-bluedark" type="submit">Tambah</button>
            </div>
          </form>
          </div>
      </div>
    </div>
    {{-- akhir modal pengumuman --}}
@endsection