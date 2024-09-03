@extends('layout.main')

{{-- Awal container --}}
@section('container')
<div class="container position-relative">
    <div class="row justify-content-center shadow-lg">
        <div class="col-md-4 bg-bluedark opacity-75">
            <div class="d-flex flex-column text-white justify-content-center p-5 overflow-hidden m-0">
                <p class="text-bluelight m-0 fs-5"> WEBSITE RESMI</p>
                <p class="fs-1 lh-1">DESA BUNTU BARANA</p>
                <p class="lh-1">Menyediakan informasi yang ada di Desa Buntu Barana</p>
                <p class="mt-4 d-flex flex-column lh-2">
                    <span class="bi bi-twitter fs-6">   #DesaBuntuBarana</span>
                    <span class="bi bi-instagram  fs-6">  DesaBuntuBarana_</span>
                    <span class="bi bi-facebook fs-6">  DesaBuntuBarana_</span>
                </p>
            </div>
        </div>
        <div class="d-none d-md-block col-md-8 p-0">
            <img id="img" class="img-fluid" src="img/bacground-desa.jpg" width="100%">
        </div>
    </div>
</div>       
@endsection
<img src="{{asset('img/bacground-desa.jpg')}}" class="w-100 h-100 object-fit position-fixed" alt="">

{{-- Akhir container --}}
