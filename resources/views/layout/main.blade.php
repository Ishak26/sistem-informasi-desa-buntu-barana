<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="/css/main.min.css">    
    <link rel="stylesheet" href="css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/cover/">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .logo{
            width: 21%;
            display: flex;
            align-items: center;
        }
        .logo img{
            width:50px;
            margin-right: 5px;
          
        }
        .logo p{
            display: flex;
            font-size:0.9rem;
            font-weight: bold;
            margin-bottom:0; 
        }
        @media (max-width: 768px) {
            .logo{
            width: 55%;
         }
        }
        .navbar-item::hover{
            text-decoration: underline;
        }
       
    </style>
</head>

<body>

    {{-- navbar// warna navbar lama = #8a2be2--}}
    <nav class="navbar navbar-expand-lg fixed-top position-sticky mb-0 encode-sans-condensed-black fs-5 bg-bluesky">
        <div class="container-fluid ms-4">
                <img class="m-1" src="/storage/logo web.png"  width="180" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center " id="navbarNavDropdown">
                <ul class="font-color navbar-nav mt-0 text-center">
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }} " aria-current="page"
                            href="/">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('berita') ? 'active' : '' }}  " href="/berita">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('layanan') ? 'active' : '' }} " href="/layanan">LAYANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('about') ? 'active' : '' }} " href="/about">TENTANG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('album') ? 'active' : '' }} " href="/album">DOKUMENTASI</a>
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
