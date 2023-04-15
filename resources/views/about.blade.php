@extends('layout.main')
@section('container')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #1E293B;
            color: whitesmoke;
        }

        .header {
            margin-top: 70px;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            color: #1E293B;

        }

        .clear {
            clear: both;
        }

        .tes {
            width: 100px;
            height: 100px;
            background-color: aqua;
            text-align: end;
        }
    </style>
    <div class="container">
        <h3 class="header text-white"> Informasi Desa XYZ</h3>
        <div class="m-auto">
            <div class="text-center float-start">
                {{-- <img src="img/{{ $kades->foto }}" class="img-fluid me-4" width="300" height="350" alt=""> --}}
                <img src="{{ asset('storage/' . $kades->foto) }}" class="img-fluid me-4" width="300" height="350"
                    alt="">
                <small class="d-block">{{ $kades->nama }}</small>
                <p>Kepala Desa XYZ</p>
            </div>
            <p class="fs-5 fw-semi-bold mb-1">Visi</p>
            <small class="lh-sm text-muted">{{ $kades->visi }}</small>
            <p class="fs-5 fw-semi-bold mb-1">Misi</p>
            <ul class="text-muted ms-3">
                @php
                    $visi = explode(',', $kades->misi);
                    foreach ($visi as $key) {
                        echo "<li> $key </li>";
                    }
                @endphp
            </ul>
        </div>
        <div class="clear"> </div>
        <div class=" border rounded shadow p-3 mt-2 d-flex w-md-75 ">
            <img src="img/map.JPG" class="img-fluid rounded-top" alt=""width="150" height="150">
            <div class="mx-3">
                <h5 class="fw-bold fs-4">Lokasi</h5>
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil veritatis doloremque omnis enim
                    impedit repudiandae libero! Maxime maiores iusto quia sunt aspernatur non. Cumque neque iusto recusandae
                    vitae in deleniti voluptates aspernatur maiores, maxime nesciunt?</small>
            </div>
        </div>

        <div class=" border rounded shadow p-3 mt-2 d-flex flex-row-reverse w-sm-75 text-end float-end">
            <img src="img/budaya.JPG" class="img-fluid rounded-top" alt="" width="150"height="150">
            <div class="mx-3 ">
                <h5 class="fw-bold fs-4 text-end ">budaya</h5>
                <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil veritatis doloremque omnis enim
                    impedit repudiandae libero! Maxime maiores iusto quia sunt aspernatur non. Cumque neque iusto recusandae
                    vitae in deleniti voluptates aspernatur maiores, maxime nesciunt?</small>
            </div>
        </div>
        <div class="clear"></div>

        <div class=" border rounded shadow p-3 mt-2 d-flex w-md-75 ">
            <img src="img/ekonomi.JPG" class="img-fluid rounded-top" alt=""width="200" height="150">
            <div class="mx-3">
                <h5 class="fw-bold fs-4"> Ekonomi </h5>
                <small>Sumber pendapatan utama desa kami adalah dari sektor pertanian. Kami juga memiliki beberapa usaha
                    kecil yang menambah sumber pendapatan desa dan juga bantuan dari pemerintah pusat dan pemerintah
                    daaerah.</small>
            </div>
        </div>


        <div class=" border rounded shadow p-3 mt-2 d-flex flex-row-reverse w-md-75 text-end float-end">
            <img src="img/kesehatan.JPG" class="img-fluid rounded-top" alt="" width="200"height="150">
            <div class="mx-3 ">
                <h5 class="fw-bold fs-4 text-end ">Kesehatan dan Kesejahteraan Desa</h5>
                <small>Tingkat kesejahteraan penduduk desa kami cukup tinggi, dengan tingkat kematian ibu dan anak yang
                    rendah. Kami juga memiliki Puskesmas yang terlatak tidak jauh dari desa kami yang menyediakan pelayanan
                    kesehatan bagi penduduk desa.</small>
            </div>
        </div>
        <div class="clear"></div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; Sistem informasi desa</p>
        </footer>
    </div>
@endsection
