<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    {{-- navbar// warna navbar lama = #8a2be2--}}
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #0E5E6F">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Informasi Desa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }} " aria-current="page"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('about') ? 'active' : '' }} " href="/about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('album') ? 'active' : '' }} " href="/album">dokumentasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('berita') ? 'active' : '' }}  " href="/berita">berita</a>
                    </li>

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
</body>

</html>
