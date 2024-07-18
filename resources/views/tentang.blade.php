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
</style>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 text-center float-start  shadow-lg">
            {{-- <img src="img/{{ $kades->foto }}" class="img-fluid me-4" width="300" height="350" alt=""> --}}
            <img src="{{ asset('storage/' . $kades->foto) }}" class="img-fluid me-4 mt-2 rounded" width="300" height="350"
                alt="">
            <small class="d-block fw-bold">{{ $kades->nama }}</small>
            <p class="fs-5 fw-bold">KEPALA DESA BUNTU BARANA</p>
        </div>
       <div class="col-md-8 ">
        <div class="p-5 m-auto text-center">
            {{-- <p class=" header-font fs-4 mb-1" style="font-weight:900">Visi</p> --}}
            <figure class="text-center">
                <blockquote class="blockquote">
                  <p class="header-font" style="font-size: 30px; font-weight:700;">"{{ $kades->visi }}"</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  {{$kades->nama}}</cite>
                </figcaption>
              </figure>
            {{-- <p class="fs-5 fw-bold mb-1">Misi</p>
            <ul class="text-muted ms-3">
                @php
                    $visi = explode(',', $kades->misi);
                    foreach ($visi as $key) {
                        echo "<li> $key </li>";
                    }
                @endphp
            </ul> --}}
        </div>
       </div>
    </div>
    <div class="row justfiy-content-center align-items-center mt-5 ">
        <div class="col-md-4 text-bluelight p-3">
            <p class="header-font text-bluelight">LETAK GEOGRAFIS</p>
            <p class=" text-bluedark p-2">Desa Buntu Barana merupakan Desa induk dari beberapa Desa yang ada di Kecamatan Curio di antaranya Desa Pebaloran, Desa Parombean, dan Desa Mandalan. Namun beberapa tahun kemudian terjadi pemekaran wilayah karena mengingat kondisi wilayahnya yang sangat luas.</p>
        </div>
        <div class="col-md-8 shadow-lg">
            <iframe class="p-2" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18333.428564258924!2d119.90453617295283!3d-3.277474043576028!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d9409a1ed3bbf23%3A0x3e1a0bdbc9648fb6!2sBuntu%20Barana%2C%20Kec.%20Curio%2C%20Kabupaten%20Enrekang%2C%20Sulawesi%20Selatan!5e1!3m2!1sid!2sid!4v1717307157688!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <div class="row mt-3 mt-5 justify-content-center align-items-center">
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide p-5" data-bs-ride="carousel">
                <div class="carousel-inner ">
                  <div class="carousel-item active">
                    <img src="img/budaya1.jpg" class="d-block w-100" height="450" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/budaya2.jpg" class="d-block w-100" height="450" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/budaya3.jpg" class="d-block w-100" height="450"    alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev ms-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next me-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 p-3">
          <h3 class="header-font text-bluedark text-center">SUKU DURI</h3>
          <p class="text-muted text-center">Adalah suku di Desa Buntu Barana dan merupakan salah satu suku bangsa yang mendiami Kabupaten Enrekang, Provinsi Sulawesi Selatan. Permukiman suku Duri ini berbatasan dengan Kabupaten Tana Toraja. Permukiman orang Duri meliputi Kecamatan Anggeraja, Masalle, Alla, Baroko, Curio, Malua, Baraka dan Buntu Batu. Permukiman suku Duri ini berbatasan dengan Tana Toraja Duri adalah etnis yang terbesar di Kabupaten Enrekang, diikuti etnis Enrekang dan Maiwa</p>
        </div>
    </div>


</div>
@include('layout.footer')
@endsection
