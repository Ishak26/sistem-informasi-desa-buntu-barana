@php
    use Illuminate\Support\Str;
@endphp
@extends('layout.main')
@section('container')
<div class="container">
        @if ($berita->all()==null)
            <div class="d-flex justify-content-center align-items-center">
                <p class="fs-5">Berita Tidak Ada</p>
            </div>
        @else
        <div class="text-center m-auto shadow mb-3">
            <img class="m-auto rounded shadow object-fit bg-dark bg-gradient" src="{{asset($berita[0]->gambar)}}" width="100%" height="300" alt="...">
            <div class="p-4">
                <h3 class="encode-sans-condensed-bold text-bluedark">{{ $berita[0]->judul }}</h3>
                <p class="lead lh-1 fs-6 w-75 mx-auto my-3">{{ str::of($berita[0]->deskripsi)->limit(200,'...')}}</p>
                <p class="lead mb-0"><a href="/berita/{{ $berita[0]->slug }}" class="text-decoration-none btn btn-sm btn-bluedark">Baca sekarang</a></p>
            </div>
          </div>
        @endif
        <div class="row jusify-content-center">
            <div class="col-4 col-sm-4 text-center">
                <h3 class="encode-sans-condensed-bold fs-3 text-bluelight">Berita</h3>
            </div>
            <div class="col-8 col-sm-4 text-center">
                <form action="/berita" method="get">
                    <div class="input-group input-group-sm mb-3">
                        <button class="btn btn-sm  btn-bluedark" type="submit">Pencarian</button>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            placeholder="Cari berita" name="filter" value="">
                    </div>
                </form>
            </div>
            <div class="row mb-2">
                @foreach ($berita->skip(1) as $Dberita)
                    <div id="berita{{$Dberita->id}}" class="col-md-6 mt-2 ">
                        <div class="d-flex h-100 border rounded flex-columns flex-sm-rows mb-4 shadow-sm" onclick="bacaBerita('berita{{$Dberita->id}}','baca{{$Dberita->id}}')" style="cursor: pointer">
                            <div class="col p-2 ms-2 d-flex flex-column position-relative">
                                <strong class="d-inline-block mb-2"> 
                                    <a class="text-decoration-none"
                                        href="/category/{{ $Dberita->category->id }}">{{ $Dberita->category->category }}
                                    </a>
                                </strong>
                                <p class="mb-0 encode-sans-condensed-semibold lh-2 fs-5 text-bluedark">{{ str::limit($Dberita['judul'], 75, ' . . .') }}</p>
                                <small class="mt-2 text-muted">{{ date_format($Dberita->created_at,'d-M-Y') }}</small>
                                <a href="berita/{{ $Dberita->slug }}" id="baca{{$Dberita->id}}" class="d-none"></a>
                            </div>
                            <div class="col">
                                    <img class=" border-start rounded object-fit" height="100%" height="100%" src="{{asset($Dberita->gambar)}}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $berita->links() }}
            </div>
        </div>
    </div>

    <script>
       function bacaBerita(beritaId,buttonId){
            const berita = document.getElementById(beritaId);
            const baca = document.getElementById(buttonId);
            berita.addEventListener("click", function (){
                baca.click();
                }
            )
       }
    </script>
    @include('layout.footer')
@endsection
