@extends('layout.main')
@section('container')
@if (session('pesanTerkirim'))
    <Script>alert('{{session('pesanTerkirim')}}')</Script>
@endif
@if (session('fail'))
    <Script>alert('{{session('fail')}}')</Script>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-absolute top-5 start-5" role="alert">
    <strong>Maaf!</strong> {{session('error')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container">
  <div class="row justify-content-around align-items-center">
    <div class="col-sm-6">
      <img src="img/layanan.jpg" width="90%">
    </div>
    <div class="col-sm-6">
      <div class="d-flex w-100 h-100 text-center flex-sm-column justify-content-evenly align-items-center">
        <div class="w-50 h-50 shadow border rounded p-3 bg-bluedark">
          <i class="bi bi-chat-left-quote-fill text-center text-white d-block fs-2"></i>
          <p class="text-muted">Kirimkan kritik dan saran anda terhadap Desa Kami!!</p>
          <a type="button" class="text-decoration-none encode-sans-condensed-semibold btn btn-sm btn-bluelight" target='_blank' data-bs-toggle="modal" data-bs-target="#kritik" >
            Kritik dan saran
          </a>
        </div>
        <div class="w-50 shadow border rounded p-3  mt-sm-3">
          <i class="bi bi-envelope text-center d-block fs-2"></i>
          <p class="text-muted">klik tombol dibawah untuk mulai mengajukan surat!</p>
          <a type="button" class="text-decoration-none encode-sans-condensed-semibold btn btn-bluelight btn-sm" data-bs-toggle="modal" data-bs-target="#ajuan" >
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
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Surat</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/layanan/surat" method="Post">
      @csrf
       <div class="modal-body">
            <label for="exampleFormControlInput1" class="form-label mt-3">Masukkan Nik Yang Terdaftar di Desa Buntu Barana</label>
            <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" placeholder="Nik Yg terdaftar">
            <label for="exampleFormControlInput1" class="form-label mt-3">Masukkan nomor telpon anda</label>
            <input type="text" name="hp" class="form-control" id="exampleFormControlInput1" placeholder="Nomor hp yang terdatar">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Lanjut</button>
      </div>
      </form>
    </div>
  </div>
</div>
   {{-- modal kritik dan saran --}}
   <div class="modal fade text-dark" id="kritik" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel1">Kritik dan Saran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/layanan/kritik"method="Post">
        @csrf
         <div class="modal-body">
              <label for="exampleFormControlInput1" class="form-label mt-3">Kritik</label>
              <textarea name="kritik" class="form-control" style="height: 200px"></textarea>
            <label for="exampleFormControlInput1" class="form-label mt-3">saran</label>
            <textarea type="text" name="Saran" class="form-control" style="height: 200px" placeholder="Saran"></textarea>
           
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  @include('layout.footer')
@endsection