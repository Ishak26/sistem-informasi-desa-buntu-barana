<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="generator" content="Hugo 0.104.2"> --}}
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <script src="{{asset('js/javascript.js')}}"></script>
    @vite('resources/js/app.js')
</head>

<body>
    @if(session('perubahan'))
        <script>alert("{{session()->pull('perubahan')}}")</script>
    @endif
    
    <div class="container-fluid">
        <header class="navbar sticky-top p-2">
            <button class="navbar-toggler d-md-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-hidden="true"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </header>
        <div class="row">
            <nav id="sidebarMenu" class="sidebar collapse col-md-3 col-lg-2 d-md-block fixed top-0 mt-0 pt-0" style="backdrop-filter: blur(10px)">
                <div class="position-sticky sidebar-sticky">
                    <div class="nav-item  text-center">
                        <a class="nav-link mb-2" data-bs-toggle="modal" data-bs-target="#profil">
                            @if (auth()->user()->profil == null)
                            <img src="/img/no-profil.JPG" class=" mt-2 object-fit bg-white border rounded-circle shadow" alt="" width="50" height="50">    
                            @else
                            <img src="{{asset('storage/'.auth()->user()->profil)}}" class=" mt-2 object-fit bg-white border rounded-circle shadow" alt="" width="80" height="80">    
                            @endif
                        </a>
                        <a href="Dashboard/pemerintah" data-bs-toggle="modal" data-bs-target="#profil" class="nav-link link-dark"><p class="fw-bold fs-6 text-uppercase">{{ auth()->user()->username}}</p></a>
                    </div>
                    <p class="ms-2 text-muted mt-3 text-uppercase">Dashboard menu</p>
                    <div class="border-bottom"></div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} link-dark" aria-current="page"
                                href="/dashboard">
                                <span class="bi bi-layout-text-sidebar-reverse me-2">
                                </span>
                                 Dashboard
                            </a>
                        </li>
                        {{-- authorize sekertaris --}}
                        @can('sekertaris')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/pendapatan') ? 'active' : '' }} link-dark" aria-current="page"
                                href="/dashboard/pendapatan">
                                <span class="bi bi-cash-stack me-2">
                                </span>
                                Keuangan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('databerita') ? 'active' : '' }} link-dark"
                                href="/databerita">
                                <span class="me-2 bi bi-newspaper">
                                </span>
                                Berita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/datapenduduk') ? 'active' : '' }} link-dark"
                            href="/dashboard/datapenduduk">
                                <span class="me-2 bi bi-people-fill">
                                </span>
                                Penduduk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/pemerintah') ? 'active' : '' }} link-dark"
                                href="/dashboard/pemerintah">
                               <span class="me-2 bi bi-people-fill" >
                            </span>
                            Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/kesehatan') ? 'active' : '' }} link-dark"
                                href="/dashboard/kesehatan">
                            <span class="me-2 bi bi-file-medical-fill">
                            </span>
                                Kesehatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/databantuan') ? 'active' : '' }} link-dark"
                                href="/dashboard/databantuan">
                                <span class="me-2 bi bi-universal-access">
                                </span>
                                Bantuan
                            </a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/surat') ? 'active' : '' }} link-dark"
                                href="/dashboard/surat">
                               <span class="me-2 bi bi-envelope-paper-fill" >
                            </span>
                                Surat
                            </a>
                        </li>
                        @endcan

                        {{-- authorize kasi pemerintahan --}}
                        @can('kasipemerintahan')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/dashboard/pendapatan') ? 'active' : '' }} link-dark" aria-current="page"
                                    href="/dashboard/pendapatan">
                                    <span class="me-2 bi bi-cash-stack">
                                    </span>
                                        Keuangan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ Request::is('dashboard/pemerintah') ? 'active' : '' }} link-dark"
                                    href="/dashboard/pemerintah">
                                <span class="me-2 bi bi-people-fill" >
                                </span>
                                    Pegawai
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ Request::is('dashboard/surat') ? 'active' : '' }} link-dark"
                                    href="/dashboard/surat">
                                <span class="me-2 bi bi-envelope-paper-fill" >
                                </span>
                                    Surat
                                </a>
                            </li>
                        @endcan

                        {{-- authorize kasi kemasyarakatan --}}
                        @can('kasikemasyarakatan')
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('databerita') ? 'active' : '' }} link-dark"
                                href="/databerita">
                                <span class="me-2 bi bi-newspaper">
                                </span>
                                    Berita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/datapenduduk') ? 'active' : '' }} link-dark"
                            href="/dashboard/datapenduduk">
                            <span class="me-2 bi bi-people-fill">
                            </span>
                                Penduduk
                        </a>
                        </li>
                        @endcan

                        {{-- authorize kasi kesejahteraan masyarakat --}}
                        @can('kasikesra')
                            <li class="nav-item">
                                <a class="nav-link  {{ Request::is('dashboard/kesehatan') ? 'active' : '' }} link-dark"
                                    href="/dashboard/kesehatan">
                                <span class="me-2 bi bi-file-medical-fill">
                                </span>
                                    Kesehatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ Request::is('dashboard/databantuan') ? 'active' : '' }} link-dark"
                                    href="/dashboard/databantuan">
                                    <span class="me-2 bi  bi-universal-access">
                                    </span>
                                     Bantuan
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/programkerja') ? 'active' : '' }} link-dark"
                                href="/dashboard/programkerja">
                                <span class="me-2 bi bi-tools">
                                </span>
                                 Program Kerja
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/pemerintah') ? 'active' : '' }} link-dark"
                                href="/dashboard/tambahalbum">
                                <span class="me-2 bi bi-file-image-fill">
                                </span>
                                 Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/kegiatan') ? 'active' : '' }} link-dark"
                                href="/dashboard/kegiatan">
                                <span class="me-2 bi bi-calendar-event">
                                </span>
                                 Kegiatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('dashboard/pengaduan') ? 'active' : '' }} link-dark"
                                href="/dashboard/pengaduan">
                                <span class="me-2 bi bi-calendar-event">
                                </span>
                                 Pengaduan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main id="main" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <img class="my-3" src="/storage/logo web.png"  width="180" alt="">
                @if (auth()->user()->can('sekertaris'))
                <div class="dropdown">
                    <button class="btn btn-sm btn-bluedark rounded dropdown-toggle position-fixed top-0 m-2 end-0 mt-4 mt-sm-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="bi bi-person-circle fs-5  "></i>
                    </button>
                    <ul class="dropdown-menu border border-0">
                        <li class="bg-danger text-center border rounded mx-2 mb-2"> 
                            <a href="/dashboard/logout"class="text-decoration-none link-light fw-bold m-2 end-0 shadow">
                            Logout
                            </a>
                         </li>
                      <li class="bg-bluelight text-center border rounded mx-2">
                        <a href="/registrasi"class="link-dark text-decoration-none">
                            Registrasi
                        </a>
                      </li>
                    </ul>
                </div>
                @else
                <a href="/dashboard/logout"class="btn btn-sm btn-danger position-fixed m-2 end-0">
                    Logout
                    <span class="bi bi-box-arrow-right"></span>
                </a>
                @endif
               
                @yield('container')

                
                <footer class="footer my-5 text-muted text-center w-100 text-small position-relative bottom-0">
                    <p class="d-block text-center">&copy; Pemerintah Desa Buntu Barana</p>
                </footer>
            </main>
        </div>

    {{-- modal Edit profil --}}
        <div class="modal mt-0" tabindex="-1" id="profil" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center"> Profil {{auth()->user()->username}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/loginprofil" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3 row">
                                <label for="profil" class="col-sm-4 col-form-label">Profil</label>
                                <div class="col-sm-8">
                                    <img id="Gambar" class="m-auto mb-2" src="" width="200" alt="">
                                    <input type="file" class="form-control gambar" name="profil"  onchange="previewImage('Gambar','.gambar')" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" hidden name="id">
                                    <input type="text" class="form-control" value="{{auth()->user()->username}}" id="Nama" readonly required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-4 col-form-label">email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" value="{{auth()->user()->email}}" id="email" readonly required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nik" class="col-sm-4 col-form-label">Nik</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" hidden name="id" value="{{auth()->user()->id}}">
                                    <input type="number" class="form-control" name="nik" id="nik" value="{{(auth()->user()->nik==null)?'':auth()->user()->nik}}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-4 col-form-label">Nomor Hanphone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="hp" id="hp" value="{{(auth()->user()->hp==null)?'':auth()->user()->hp}}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{(auth()->user()->alamat==null)?'':auth()->user()->alamat}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="taggallahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="taggallahir" name="tanggallahir" value="{{(auth()->user()->tanggallahir==null)?'': auth()->user()->tanggallahir}}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="laki-laki" {{(auth()->user()->jeniskelamin === 'laki-laki' )?'checked':''}}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-laki
                                    </label>
                                    <input class="form-check-input" type="radio" name="jeniskelamin"
                                        value="perempuan" {{(auth()->user()->jeniskelamin === 'perempuan')?'checked':''}}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                    </label>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Akhir modal --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>   
</body>
</html>
