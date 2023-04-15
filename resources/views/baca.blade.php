@extends('layout.main')

{{-- Awal Container --}}

@section('container')
    <style>
        .container {
            width: 70%;
            margin: auto;
        }

        .conten {
            padding: 0px 50px;
            margin: auto;

        }
    </style>
    <div class="container">
        {{-- <img class="img-fluid" src="../img/{{ $baca['gambar'] }}" alt="" width="100%" height=""> --}}
        <img class="img-fluid" src="{{ asset('storage/' . $baca->gambar) }}" alt="" width="100%" height="">
        <h3 class="fs-3 text-center my-3"> {{ $baca['judul'] }}</h3>
        <div class="conten">
            <p class="d-inline"><small class="opacity-75 d-inline">{{ $baca->created_at }} </small> {!! $baca['deskripsi'] !!}
            </p>
        </div>

        <a href="/berita" class="mt-3">kembali</a>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Sistem informasi desa</p>

    </footer>
@endsection

{{-- Akhir Container --}}


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</body>

</html>
