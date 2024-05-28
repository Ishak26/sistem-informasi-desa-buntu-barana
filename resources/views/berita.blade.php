@php
    use Illuminate\Support\Str;
    
@endphp
@extends('layout.main')
@section('container')
    <style>
        /* body {
            background-color: #1E293B;
            color: whitesmoke;
        } */
    </style>

    @if ($berita[0]->gambar)
        <div
            class="p-4 p-md-5 my-4"style="background-image:url('{{ asset('storage/' . $berita[0]->gambar) }}'); background-size:cover; background-position:center; background-repeat:no-repeat;">
        @else
            <div
                class="p-4 p-md-5 my-4"style="background-image:url('https://loremflickr.com/1080/720/{{ $berita[0]->category->category }}'); background-size:cover; background-position:center; background-repeat:no-repeat;">
    @endif

    <div class="col-md-6 p-4 text-white  " style="background-color: rgba(0,0,0,.6);">
        <h3 class=" lh-1  ">{{ $berita[0]->judul }}</h3>
        <p class="lead text-muted my-3">{{ str::limit($berita[0]->deskripsi) }}</p>
        <p class="lead mb-0"><a href="/berita/{{ $berita[0]->slug }}" class="text-decoration-none btn btn-sm btn-primary">Baca
                sekarang</a></p>
    </div>
    </div>

    <div class="container">
        <div class=" row">
            <div class="col-4 col-sm-4 text-center">
                <h3 class="fw-semibold">Berita</h3>
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
            <div class="col-auto text-center">
                {{-- <div class="btn-group r">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu">
                        <li></li>
                    </ul>
                </div> --}}
            </div>
            <div class="row mb-2">
                @foreach ($berita->skip(1) as $Dberita)
                    <div class="col-md-6 ">
                        <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-200 position-relative ">
                            <div class="col p-4 d-flex flex-column position-relative">
                                <strong class="d-inline-block mb-2 text-success"> <a class="text-decoration-none"
                                        href="/category/{{ $Dberita->category->id }}">{{ $Dberita->category->category }}
                                    </a></strong>
                                <h5 class="mb-0 fw-normal opacity-75">{{ str::limit($Dberita['judul'], 70, ' . . .') }}</h5>
                                <small class="mb-1 opacity-75">{{ date_format($Dberita->created_at,'d-m-Y') }}</small>
                                <a href="/berita/{{ $Dberita->slug }}"
                                    class="position-absolute bottom-0 mb-3 text-decoration-none btn btn-sm btn-primary">Baca
                                    sekarang</a>
                            </div>
                            <div class="col-auto d-lg-block">
                                @if ($Dberita->gambar)
                                    <img src="{{ asset('storage/' . $Dberita->gambar) }}" alt="" width="200"
                                        height="200">
                                @else
                                    <img src="https://loremflickr.com/200/200/{{ $Dberita->category->category }}"
                                        alt="">
                                @endif
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
