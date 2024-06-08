@php
    use Illuminate\Support\Str;
    
@endphp
@extends('layout.main')
@section('container')
    <div class="container">
        <div class="w-100 text-center m-auto shadow mb-3">
            <img class="m-auto rounded shadow" src="{{$berita[0]->gambar}}" width="100%" height="300" alt="...">
            <div class="p-4">
                <h3 class="encode-sans-condensed-bold text-bluedark">{{ $berita[0]->judul }}</h3>
                <p class="lead lh-1 fs-6 text-muted my-3">{{ str::of($berita[0]->deskripsi)->limit(200,'...')}}</p>
                <p class="lead mb-0"><a href="/berita/{{ $berita[0]->slug }}" class="text-decoration-none btn btn-sm btn-primary">Baca sekarang</a></p>
            </div>
          </div>
        <div class=" row">
            <div class="col-4 col-sm-4 text-center">
                <h3 class="encode-sans-condensed-bold fs-3 text-bluelight">Berita</h3>
            </div>
            <div class="col-sm-4 col-md-4 col-">
                <form action="/berita" method="get">
                    <div class="input-group input-group-sm mb-3">
                        <button class="btn btn-sm  btn-primary" type="submit">Pencarian</button>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            placeholder="Cari berita" name="filter">
                    </div>
                </form>
            </div>
            <div class="row mb-2">
                @foreach ($berita->skip(1) as $Dberita)
                    <div class="col-md-6 ">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 positi2n-relative ">
                            <div class="col p-2 ms-2 d-flex flex-column position-relative">
                                <strong class="d-inline-block mb-2 text-success"> <a class="text-decoration-none"
                                        href="/category/{{ $Dberita->category->id }}">{{ $Dberita->category->category }}
                                    </a></strong>
                                <p class="mb-0 encode-sans-condensed-semibold fs-5 lh-1 text-bluedark">{{ str::limit($Dberita['judul'], 100, ' . . .') }}</p>
                                <small class="mt-2 opacity-75">{{ date_format($Dberita->created_at,'d-M-Y') }}</small>
                                <a href="/berita/{{ $Dberita->slug }}"
                                    class="position-absolute bottom-0 mb-3 text-decoration-none btn btn-sm btn-primary">Baca
                                    sekarang</a>
                            </div>
                            <div class="col-auto d-lg-block">
                                {{-- @if ($Dberita->gambar)
                                    <img src="{{ asset('storage/' . $Dberita->gambar) }}" alt="" width="200"
                                        height="200">
                                @else --}}
                                    <img src="{{$Dberita->gambar}}" alt="" width="250" height="200">
                                {{-- @endif --}}
                                {{-- @if ($Dberita->gambar)
                                    <img src="img/{{ $Dberita['gambar'] }}" alt="" width="200" height="200">
                                @else
                                @endif --}}
                                {{-- <img src="img/{{ $Dberita['gambar'] }}" alt="" width="200" height="200"> --}}
                                {{-- <img src="https://loremflickr.com/200/200/{{ $Dberita->category->category }}"
                                    alt=""> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $berita->links() }}
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; Sistem informasi desa</p>
            </footer>
        </div>
    </div>
@endsection
