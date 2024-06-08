@extends('layout.main')
@section('container')
    <div class="container text-center">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col align-self-center">
          <img src="img/layanan.jpg" width="400"">
        </div>
        <div class="col">
            <div class="d-flex flex-column justify-content-center align-items-center mt-5 ms-5" style="height: 400px; width:400px">
              <div class="col w-50 h-50 shadow border mb-3 rounded">
                <i class="bi bi-chat-left-quote-fill text-center d-block p-2 fs-2"></i>
                <a class="text-decoration-none encode-sans-condensed-semibold" href="">Kritik dan saran</a>
              </div>
              <div class="col w-50 h-50 shadow border mb-3 rounded">
                <i class="bi bi-envelope text-center d-block p-2 fs-2"></i>
                <a type="button" class="text-decoration-none encode-sans-condensed-semibold" target='_blank' data-bs-toggle="modal" data-bs-target="#ajuan" >
                  Ajukan Surat
              </a>
              </div>
              <div class="col w-50 h-50 shadow border mb-3 rouunded">
                <i class="bi bi-telephone-inbound-fill text-center d-block p-2 fs-2"></i>
                <a class="text-decoration-none encode-sans-condensed-semibold" href="">Hubungi kami</a>
              </div>
              
            </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-dark" id="ajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Surat</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/about/surat" method="Post">
          @csrf
           <div class="modal-body">
            <p>Pilih Jenis Surat yang Diajukan</p>
              <select name="namasurat" class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>
                  <option value="Surat Pangantar SKCK">Surat Pangantar SKCK</option>
                  <option value="Surat Pengantar NPWP">Surat Pengantar NPWP</option>
                  <option value="Surat Pengantar KTP">Surat Pengantar KTP </option>
                </select>
                <label for="exampleFormControlInput1" class="form-label mt-3">Masukkan Nik Yang Terdaftar di Desa Buntu Barana</label>
                <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" placeholder="Nik Yg terdaftar">
              </div>
              <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary"><a target="_blank">Lanjut</a></button>
          </div>
          </form>
        </div>
      </div>
    </div>
@endsection