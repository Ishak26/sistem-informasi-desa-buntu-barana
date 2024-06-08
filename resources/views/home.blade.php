@extends('layout.main')

{{-- Awal container --}}

@section('container')
<div class="container">
    <div class="row justify-content-center shadow">
        <div class="col-4 bg-bluedark">
            <div class="d-flex flex-column text-white justify-content-center p-5 overflow-hidden m-0">
                <p class="encode-sans-condensed-bold text-bluelight m-0 fs-6"> WEBSITE RESMI</p>
                <p class="header-font">DESA BUNTU BARANA</p>
                <p class=".encode-sans-condensed-regular lh-1">Menyediakan informasi yang ada di Desa Buntu Barana</p>
                <p class="mt-4 d-flex flex-column lh-2">
                    <span class="bi bi-twitter fs-6">   #DesaBuntuBarana</span>
                    <span class="bi bi-instagram  fs-6">  DesaBuntuBarana_</span>
                    <span class="bi bi-facebook fs-6">  DesaBuntuBarana_</span>
                </p>
            </div>
        </div>
        <div class="col-8 p-0">
            <img src="img/bacground-desa.jpg" width="100%">
        </div>
    </div>
   </div>       
@endsection

{{-- Akhir container --}}
