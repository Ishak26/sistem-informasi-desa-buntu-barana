@extends('layout.main')
@section('container')
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .content{
            height: 100vh;
        }
        .clear {
            clear: both;
        }

        /* .header {
            margin-top: 70px;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            color: #1E293B;

        }

        .tes {
            width: 100px;
            height: 100px;
            background-color: aqua;
            text-align: end;
        } */
    </style>
    <div class="container-fluid">
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show position-absolute top-5 start-5" role="alert">
            <strong>Maaf!</strong> {{session('error')}}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <h3 class="text-center fs-2 fw-bold">Informasi Desa Buntu Barana</h3>
        <div class="row justify-content-around align-items-center m-auto">
            <div class=" col-md-4 text-center float-start">
                {{-- <img src="img/{{ $kades->foto }}" class="img-fluid me-4" width="300" height="350" alt=""> --}}
                <img src="{{ asset('storage/' . $kades->foto) }}" class="img-fluid me-4" width="300" height="350"
                    alt="">
                <small class="d-block">{{ $kades->nama }}</small>
                <p>Kepala Desa XYZ</p>
            </div>
           <div class="col-md-4">
            <p class="fs-5 fw-bold mb-1">Visi</p>
            <small class="lh-sm text-muted">{{ $kades->visi }}</small>
            <p class="fs-5 fw-bold mb-1">Misi</p>
            <ul class="text-muted ms-3">
                @php
                    $visi = explode(',', $kades->misi);
                    foreach ($visi as $key) {
                        echo "<li> $key </li>";
                    }
                @endphp
            </ul>
           </div>
        </div>
        {{-- <div class=" border rounded shadow p-3 mt-2 d-flex w-md-75 ">
            
            
        </div> --}}
        <div class="row justify-content-around align-items-center bg-light text-dark content">
            <div class="col-sm-4">
                <img src="img/map.JPG" class="img-fluid rounded-top">
            </div>
            <div class="col-sm-4">
                <div class="mx-3">
                    <h5 class="fw-bold fs-4">Lokasi</h5>
                    <small>Desa Buntu Barana merupakan Desa induk dari beberapa Desa yang ada di Kecamatan Curio di antaranya Desa Pebaloran, Desa Parombean, dan Desa Mandalan. Namun beberapa tahun kemudian terjadi pemekaran wilayah karena mengingat kondisi wilayahnya yang sangat luas. Untuk mengefektifkan pembangunan yang di setiap wilayah maka sangat di perlukan pemekaran wilayah. Desa Buntu Barana terkenal dengan masyarakatnya yang sangat religius atau taat beribadah, terbukti dengan adanya sekolah-sekolah agama yang berada di Desa Buntu Barana, seperti PGA 6 tahun yang kemudian berganti dengan nama menjadi Madrasah Aliyah Buntu Barana,  MTs Madrasah Tsanawiyah Buntu Barana, dan Mim Buntu Barana.</small>
                </div>
            </div>
        </div>

        <div class="row justify-content-around align-items-center bg-light text-dark content">
            <div class="col-sm-4">
                <img src="img/budaya.JPG" class="img-fluid rounded-top">
            </div>
            <div class="col-sm-4">
                <div class="mx-3">
                    <h5 class="fw-bold fs-4">Budaya</h5>
                    <small>Desa Buntu Barana merupakan Desa induk dari beberapa Desa yang ada di Kecamatan Curio di antaranya Desa Pebaloran, Desa Parombean, dan Desa Mandalan. Namun beberapa tahun kemudian terjadi pemekaran wilayah karena mengingat kondisi wilayahnya yang sangat luas. Untuk mengefektifkan pembangunan yang di setiap wilayah maka sangat di perlukan pemekaran wilayah. Desa Buntu Barana terkenal dengan masyarakatnya yang sangat religius atau taat beribadah, terbukti dengan adanya sekolah-sekolah agama yang berada di Desa Buntu Barana, seperti PGA 6 tahun yang kemudian berganti dengan nama menjadi Madrasah Aliyah Buntu Barana,  MTs Madrasah Tsanawiyah Buntu Barana, dan Mim Buntu Barana.</small>
                </div>
            </div>
        </div>


{{-- 
<div class="test">
    

    <div class=" content border rounded shadow p-3 mt-2 d-flex flex-row-reverse w-sm-75 text-end float-end">
        <img src="img/budaya.JPG" class="img-fluid rounded-top" alt="" width="150"height="150">
        <div class="mx-3 ">
            <h5 class="fw-bold fs-4 text-end ">budaya</h5>
            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil veritatis doloremque omnis enim
                impedit repudiandae libero! Maxime maiores iusto quia sunt aspernatur non. Cumque neque iusto recusandae
                vitae in deleniti voluptates aspernatur maiores, maxime nesciunt?</small>
        </div>
    </div>
    <div class="clear"></div>

    <div class=" border rounded shadow p-3 mt-2 d-flex w-md-75 ">
        <img src="img/ekonomi.JPG" class="img-fluid rounded-top" alt=""width="200" height="150">
        <div class="mx-3">
            <h5 class="fw-bold fs-4"> Ekonomi </h5>
            <small>Sumber pendapatan utama desa kami adalah dari sektor pertanian. Kami juga memiliki beberapa usaha
                kecil yang menambah sumber pendapatan desa dan juga bantuan dari pemerintah pusat dan pemerintah
                daaerah.</small>
        </div>
    </div>


    <div class=" border rounded shadow p-3 mt-2 d-flex flex-row-reverse w-md-75 text-end float-end">
        <img src="img/kesehatan.JPG" class="img-fluid rounded-top" alt="" width="200"height="150">
        <div class="mx-3 ">
            <h5 class="fw-bold fs-4 text-end ">Kesehatan dan Kesejahteraan Desa</h5>
            <small>Tingkat kesejahteraan penduduk desa kami cukup tinggi, dengan tingkat kematian ibu dan anak yang
                rendah. Kami juga memiliki Puskesmas yang terlatak tidak jauh dari desa kami yang menyediakan pelayanan
                kesehatan bagi penduduk desa.</small>
        </div>
    </div>
    <div class="clear"></div>
</div> --}}
        <!-- Button trigger modal -->
<a type="button" class="btn btn-primary" target='_blank' data-bs-toggle="modal" data-bs-target="#ajuan" >
    Ajukan Surat
  </a>
  
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

  

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; Sistem informasi desa</p>
        </footer>
    </div>
@endsection
