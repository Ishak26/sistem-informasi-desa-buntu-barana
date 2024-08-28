@php
    use Illuminate\Support\Str;
@endphp
@extends('layout.main')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <img class="img-fluid object-fit" src="{{"/storage/".$baca->gambar}}" alt="" width="100%" height="50%">
            <h3 class="fs-3 text-center my-3"> {{ $baca['judul'] }}</h3>
            <div class="conten">
                <p class="float-start" style="margin-top: 19px;margin-bottom:0px">
                    <small class="text-muted">{{ date_format($baca->created_at,'d-M-Y') }} --</small>
                    {!! $baca['deskripsi'] !!}
                </p>
            </div>
            <p class="float-end"></p>
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