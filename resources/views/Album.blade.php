@extends('layout.main')
@section('container')
    {{-- awal container --}}
    <style>
        body {
            background-color: #1E293B;
            color: whitesmoke;
        }

        .bg-hijau {
            background-color: #0E5E6F;
        }

        .mb-35 {
            margin-bottom: 20px;
        }

        .bg-footer {
            background-color: #1E293B;
        }
    </style>
    <h1 class="text-center">ALBUM</h1>
    <div class="container">
        <div class="row ">
            @foreach ($Albums as $album)
                <div class="col-md-4 mb-2 p-3">
                    <div class="album rounded border p-2 border-box shadow w-100 h-100">
                        <img class="p-1 text-content-center  text-center" src="{{ asset('storage/' . $album->gambar) }}"
                            alt="" width="100%" height="90%">
                        <div class="">
                            <a class="bi bi-chat-dots ms-2 text-decoration-none text-white" data-bs-toggle="modal"
                                data-bs-target="" href="#exampleModal{{ $album->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                    class="bi bi-chat-dots mx-1" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    <path
                                        d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                                </svg>
                                Komentar
                            </a>

                        </div>
                    </div>
                </div>
                {{-- modal komentar --}}
                <div class="modal fade" id="exampleModal{{ $album->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="/album/komentar" method="post">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-hijau">
                                    <h5 class="modal-title" id="exampleModalLabel">Kolom komentar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($album->komentar as $item)
                                        <input type="text" class="form-control mt-1 text-dark"
                                            placeholder="{{ $item->komentar }}">
                                    @endforeach

                                </div>
                                <div class="modal-footer bg-footer">
                                    <input type="hidden" class="form-control" placeholder="Komentar anda" name="id_gambar"
                                        value="{{ $album->id }}">
                                    <input type="text" class="form-control" placeholder="Komentar anda" name="komentar"
                                        required>
                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}

                                    {{-- <button type="submit" class="opacity-0">
                                        <a href="" type="submit" class="position-absolute bottom-0 mb-35 me-3"> <svg
                                                xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                fill="currentColor" class="bi bi-s  end-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                            </svg>
                                        </button></a> --}}
                                    <button type="submit"
                                        class="btn btn-hijau position-absolute bottom-0 mb-3 rounded  "><svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                        </svg></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Akhirmodal --}}
            @endforeach
        </div>
    </div>
@endsection
{{-- Akhir section --}}
