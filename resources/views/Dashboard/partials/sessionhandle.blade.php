  @if ( session('sukses'))
  <div class="alert alert-success" role="alert" id="alert">
      <h4 class="alert-heading">Berhasil!</h4>
      <hr>
      <p class="mb-0">{{ session('sukses')}}</p>
      <p class="position-absolute top-0 end-0 p-3 me-3" >tutup dalam <span id="time"></span> detik</p>
  </div>
  @elseif ( session('hapus'))
  <div class="alert alert-danger" role="alert" id="alert">
      <h4 class="alert-heading">Berhasil!</h4>
      <hr>
      <p class="mb-0">{{ session('hapus')}}</p>
      <p class="position-absolute top-0 end-0" >tutup dalam <span id="time"></span> detik</p>
  </div>
  @elseif ( session('edit'))
  <div class="alert alert-warning" role="alert" id="alert">
      <h4 class="alert-heading">Berhasil!</h4>
      <hr>
      <p class="mb-0">{{ session('edit')}}</p>
      <p class="position-absolute top-0 end-0" >tutup dalam <span id="time"></span> detik</p>
  </div>
  @elseif ( session('verifikasi'))
  <div class="alert alert-success" role="alert" id="alert">
      <h4 class="alert-heading">Berhasil!</h4>
      <hr>
      <p class="mb-0">{{ session('verifikasi')}}</p>
      <p class="position-absolute top-0 end-0" >tutup dalam <span id="time"></span> detik</p>
  </div>
  @endif
  <script>
    myAlert()
 </script>
