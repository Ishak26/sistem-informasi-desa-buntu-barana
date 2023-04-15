
@extends('layout.main')
@section('container')
<div class="row">
 @foreach ($category as $Dberita)
 <div class="col m-3">
    <div class="card" style="width: 18rem;">
      <img src="../../img/{{$Dberita["gambar"]}}" class="card-img-top" alt="...">
      <div class="card-body">
        <p>category : {{$categoryname->category}} </p>
        <a class="text-decoration-none " href="/berita/{{$Dberita->slug}}">
        <h5 class="card-title">{{$Dberita["judul"]}}</h5>
        </a>
        <p class="card-text">{{$Dberita["excerpt"]}}</p>
        <a href="/berita/{{$Dberita->slug}}" class="btn btn-primary">Baca Sekarang</a>
      </div>
    </div>
 </div>
 @endforeach
</div>
@endsection