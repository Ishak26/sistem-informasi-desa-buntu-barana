@php
    use Illuminate\Support\Str;
@endphp
@extends('layout.main')
@section('container')
<style>
  .encode-sans-condensed-bold {
    font-family: "Encode Sans Condensed", sans-serif;
    font-weight: 700;
    font-style: normal;
  }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <img class="img-fluid object-fit" src="{{"/".$baca->gambar}}" alt="" width="100%" height="50%">
            <h3 class="fs-3 text-center my-3"> {{ $baca['judul'] }}</h3>
            <div class="conten">
                <p class="fs-6"><small class="text-muted d-inline">{{ date_format($baca->created_at,'d-M-Y') }} - </small>
                    {!! $baca['deskripsi'] !!}
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="shadow p-3 ">
                <p class="fs-5 fw-bold">BACA JUGA :</p>
                @foreach ($berita as $item)
                    <a href="" class="lh-sm py-3 text-bluedark d-block text-decoration-none fw-bold p-1 border-bottom border-1 border-bluedark">{{ str::limit($item['judul'], 100, ' . . .') }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <a href="/berita" class="mt-3">kembali</a>
</div>
@include('layout.footer')
@endsection