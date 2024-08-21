@extends('layout.main')
@section('container')
    {{-- awal container --}}
    <div class="container">
        <h3 class="encode-sans-condensed-extrabold text-center text-bluelight py-3">KOLEKSI FOTO</h3>
        <div class="row ">
            @empty($Albums->all())
                <h3 class="text-center">BELUM ADA GAMBAR YANG DI TERSEDIA</h3>
            @endempty
            @foreach ($Albums as $album)
                <div class="col-md-4 mb-3">
                    <div class="rounded border p-2 border-box shadow w-100 h-100">
                        <img class="p-1 text-content-center object-fit text-center" src="{{ asset('storage/' . $album->gambar) }}"
                            alt="" width="100%" height="90%">
                        <div class="text-center">
                            <a class="btn text-decoration-none text-bluedark" data-bs-toggle="modal"
                                data-bs-target="" href="#exampleModal{{ $album->id }}">
                                <span class="bi bi-chat-dots"> komentar</span>
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
                                    <button type="submit"
                                        class="btn btn-hijau position-absolute bottom-0 mb-3 rounded  ">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
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
    @include('layout.footer')
    <script src="js/javascript.js"></script>
@endsection
{{-- Akhir section --}}
