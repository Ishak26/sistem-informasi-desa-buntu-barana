@extends('layout.main')
@section('container')
@if (session('pesanTerkirim'))
    <Script>alert('{{session('pesanTerkirim')}}')</Script>
@endif
@if (session('fail'))
    <Script>alert('{{session('fail')}}')</Script>
@endif
@if (session('error'))
    <Script>alert('{{session('error')}}')</Script>
@endif
<div class="container">
  <div class="row justify-content-around align-items-center">
    <div class="col-sm-6">
      <img src="img/layanan.jpg" width="90%">
    </div>
    <div class="col-sm-6">
      <div class="d-flex w-100 h-100 text-center flex-sm-column justify-content-evenly align-items-center">
        <div class="w-50 h-50 shadow border rounded p-3 bg-bluedark">
          <i class="bi bi-wechat text-center text-white d-block fs-1 mb-2"></i>
          <p class="text-muted text-normal">Kirimkan kritik dan saran anda terhadap Desa Kami!!</p>
          <a type="button" class="text-decoration-none btn btn-sm btn-bluelight" data-bs-toggle="modal" data-bs-target="#kritik" >
            kritik & saran
          </a>
        </div>
        <div class="w-50 shadow border rounded p-3  mt-sm-3">
          <i class="bi bi-envelope-fill text-center d-block fs-1 mb-2"></i>
          <p class="text-muted ">klik tombol dibawah untuk mulai mengajukan surat!</p>
          <a type="button" class="text-decoration-none btn btn-bluelight btn-sm" data-bs-toggle="modal" data-bs-target="#ajuan" >
            Ajukan Surat
          </a>
        </div>
      </div> 
    </div>
  </div>
</div>
 <!-- Modal pengajuan surat -->
 <div class="modal fade text-dark" id="ajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-bluedark">
        <p class="modal-title text-white fs-5" id="exampleModalLabel">Pengajuan Surat</p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/layanan/surat" method="Post">
      @csrf
       <div class="modal-body">
            <label for="exampleFormControlInput1" class="form-label mt-3">Masukkan Nik Yang Terdaftar di Desa Buntu Barana</label>
            <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nik Yg terdaftar">
            @error('nik')
                <div class="invlid-feedback">
                  {{$message}}
                </div>
            @enderror
            <label for="exampleFormControlInput1" class="form-label mt-3">Masukkan nomor telpon anda</label>
            <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nomor hp yang terdatar">
            @error('nik')
                <div class="invlid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-bluedark">Lanjut</button>
      </div>
      </form>
    </div>
  </div>
</div>
   {{-- modal kritik dan saran --}}
   <div class="modal fade text-dark" id="kritik" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-bluedark">
          <p class="modal-title fs-5 text-white" id="exampleModalLabel1">Kritik dan Saran</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/layanan/kritik"method="Post">
        @csrf
         <div class="modal-body">
              <label for="exampleFormControlInput1" class="form-label mt-3">Kritik</label>
              <textarea name="kritik" class="form-control" placeholder="kriritikan anda" style="height: 100px"></textarea>
            <label for="exampleFormControlInput1" class="form-label mt-3">saran</label>
            <textarea type="text" name="Saran" class="form-control" style="height: 100px" placeholder="Saran yang akan diberikan"></textarea>
            
          </div>
          <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-bluedark">Kirim</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  @include('layout.footer')
@endsection