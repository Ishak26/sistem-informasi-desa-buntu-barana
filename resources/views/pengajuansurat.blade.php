@extends('layout.main')
@section('container')
<div class="container shadow p-5 rounded">
  <a href="/layanan/surat/keluar" class=" btn btn-danger">keluar</a>
  <p class="text-center fw-bold fs-4 p-3"><span class="text-uppercase">Selamat datang</span> {{$pengaju->nama}}</p>
  <button class="btn btn-sm btn-bluelight fw-semibold" data-bs-toggle="modal" data-bs-target="#ajuan">ajukan surat</button>   

  <table class="table text-center">
    <tr>
      <th style="width:5%;">No</th>
      <th style="width:65%;">Jenis Surat</th>
      <th style="width:20%;">Status Pengajuan</th>
      <th style="width:15%;">keterangan</th>
    </tr>
    @foreach ($dataSurat as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td class="text-start">{{$item->jenis}}</td>
          <td class="{{($item->verifikasi == 0 )?'text-danger':'text-success';}}">{{($item->verifikasi == 0 )?'Belum diverifikasi':'Terverifikasi'}}</td>
          <td class="d-flex flex-rows justify-content-center align-items-center gap-2">
            @if ($item->verifikasi == 0)
                <p>Tunggu verifikasi</p>
            @else
              <a target="_blank" href="{{asset('storage/file-surat/'.$item->filesurat)}}" class="btn btn-sm btn-bluelight"><span class="bi bi-eye"></span></a>
              <a href="" class="btn btn-sm btn-bluedark"><i class="bi bi-download"></i></a>
            @endif     
          </td>
        </tr>
    @endforeach
      </table>
{{-- form pengajuan surat --}}
  <div class="modal fade text-dark" id="ajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header  text-light bg-bluedark">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Surat</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/layanan/pengajuansurat" method="Post">
        @csrf
        <div class="modal-body">
          <p>Pilih Jenis Surat yang Diajukan</p>
            <select name="jenis" class="form-select" aria-label="Default select example">
                <option selected>--pilih--</option>
                <option value="Surat Pangantar SKCK">Surat Pengantar SKCK</option>
                <option value="Surat Pengantar NPWP">Surat Pengantar NPWP</option>
                <option value="Surat Pengantar KTP">Surat Izin Usaha</option>
              </select>
              <label for="exampleFormControlInput1" class="form-label mt-3">Keperluan Surat</label>
              <input type="text" name="keperluan" class="form-control" id="exampleFormControlInput1" placeholder="Keperluan Surat">
              <input type="hidden" value="{{$pengaju->id}}" name="id_warga" class="form-control">
            </div>
            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Lanjut</button>
        </div>
        </form>
      </div>
    </div>
  </div>
{{-- Akhir form pengajuan surat --}}
</div>
@endsection