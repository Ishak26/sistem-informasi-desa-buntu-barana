@extends('layout.main')

{{-- Awal container --}}
@section('container')
<div class="container position-relative">
    <div class="row justify-content-center shadow-lg">
        <div class="col-md-4 bg-" style="backdrop-filter: blur(20px);">
            <div class="d-flex flex-column text-dark shadow justify-content-center p-5 overflow-hidden m-0">
                <img class="text-center m-auto  mb-3" src="/storage/R.png"  width="50" height="60" alt="">
                <p class="text-bluedark m-0 fs-5"> WEBSITE RESMI</p>
                <p class="fs-1 lh-1">DESA BUNTU BARANA</p>
                <p class="lh-1 font-monospace">Menyediakan informasi yang ada di Desa Buntu Barana</p>
                <p class="mt-4 d-flex text-muted flex-column lh-2">
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
