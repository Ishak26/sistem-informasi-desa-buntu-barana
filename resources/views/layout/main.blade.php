<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">       
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <style>
        *{
            margin: 0;
            padding:0;
            /* font-family: 'Poppins', sans-serif; */
        }

        .navbar-item::hover{
            text-decoration: underline;
        }
       
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg mb-0 encode-sans-condensed-black "style="z-index: 99; backdrop-filter:blur(20px);">
        <div class="container ms-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" z-index="-1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown" >
                <ul class="navbar-nav mt-0 align-items-center text-lowercase fs-5 text-center">
                    <li class="nav-item">
                        <img class="logo me-md-3 m-1" src="/storage/R.png"  width="40" alt="">
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item ms-sm-2">
                        <a class="nav-link" href="/">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('tentang') ? 'active' : '' }} " href="/tentang">PROFIL DESA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('berita') ? 'active' : '' }}  " href="/berita">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('layanan') ? 'active' : '' }} " href="/layanan">LAYANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('dokumentasi') ? 'active' : '' }} " href="/dokumentasi">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-center">
                            <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              INFO
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link  {{ Request::is('info/keuangan') ? 'active' : '' }}  " href="/info/keuangan">KEUANGAN DESA</a></li>
                              <li><a class="nav-link  {{ Request::is('kegiatan') ? 'active' : '' }}  " href="/kegiatan">Kegiatan</a></li>
                            </ul>
                          </div>
                    </li>
                    @if (session('penduduk'))
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('layanan/surat') ? 'active' : '' }} " href="/layanan/surat">SURAT</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    {{-- akhir navbar --}}
    {{-- container --}}

    @yield('container')

    {{-- akhir container --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>
</html>
