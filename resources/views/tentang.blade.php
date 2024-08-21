@extends('layout.main')
@section('container')
<style>
  .geografisText::-webkit-scrollbar{
    display: none;
  }
  .sejarah::-webkit-scrollbar{
    display: none;
  }
</style>
<div class="container">
    <section id="visMisi" class="row justify-content-center align-items-center">
        <div class="col-md-4 text-center float-start">
            {{-- <img src="img/{{ $kades->foto }}" class="img-fluid me-4" width="300" height="350" alt=""> --}}
            <img src="{{ asset('storage/' . $kades->foto) }}" class="img-fluid me-4 my-2 p-3 shadow" width="300" height="400"
                alt="">
            <small class="d-block fw-bold">{{ $kades->nama }}</small>
            <p class="fs-5 fw-bold">KEPALA DESA BUNTU BARANA</p>
        </div>
       <div class="col-md-8 ">
        <div class="p-5 m-auto text-center">
            <figure class="text-center">
                <blockquote class="blockquote">
                  <p class="fs-5">{{ $kades->visi }}"</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  {{$kades->nama}}</cite>
                </figcaption>
              </figure>
        </div>
       </div>
    </section>

    
    <section id="sejarahDesa" class="my-5">
      <p class="fs-4 text-center fw-bold">Sejarah Desa</p>
      <div class="sejarah m-auto overflow-scroll" style="max-width: 50%; max-height:500px;">
          <p class="text-center">Desa Buntu Barana merupakan Desa induk dari beberapa Desa yang ada di Kecamatan Curio di antaranya Desa Pebaloran, Desa Parombean, dan Desa Mandalan. Namun beberapa tahun kemudian terjadi pemekaran wilayah karena mengingat kondisi wilayahnya yang sangat luas. Untuk mengefektifkan pembangunan yang di setiap wilayah maka sangat di perlukan pemekaran wilayah. Desa Buntu Barana terkenal dengan masyarakatnya yang sangat religius atau taat beribadah, terbukti dengan adanya sekolah-sekolah agama yang berada di Desa Buntu Barana, seperti PGA 6 tahun yang kemudian berganti dengan nama menjadi Madrasah Aliyah Buntu Barana,  MTs Madrasah Tsanawiyah Buntu Barana, dan Mim Buntu Barana.</br>
          Desa Buntu Barana terdiri dari 6 Dusun antara lain: Dusun Rante Limbong, Dusun Buntu Kalosi, Dusun Buntu Ampalla, Dusun Saluala, Dusun Maliba, dan Dusun Bala Batu. Luas Wilayah Desa Buntu Barana berkisar 3.794 Hektar</br>
          Pada tahun 1965 Kepala Wilayah Kecamatan Alla yang dijabat oleh Puang Barana sebagai Putra Rante menunjuk Uwa Tahera sebagai Kepala Desa pertama di Rantelimbong. Tugas pertama yang dilakukan oleh Kepala Desa adalah mengumpul kembali warga terpencar untuk kembali berkumpul dan menghuni Rantelimbong. Pada saat ini Desa yang dipimpinnya diberi nama Desa Buntu Barana. Nama Buntu Barana sendiri diambil dari nama sebuah gunung kecil (bukit) di sebelah utara Rantelimbong yang diatasnya tumbuh sebuah pohon besar yang pada saat ini gunug itulah satu-satunya gunung disekitar Rantelimbong yang ditumbuhi pohon. Sehingga gunung itu disebut oleh warga Buntu Barana (Gunung Berpohon) dan gunung itulah yang berlangsung diambil sebagai nama Desa sehingga disebutlah Desa Buntu Barana. Selain itu nama Desa Buntu barana diidentikkan juga dengan nama Puang Barana sebagai Putera Rantelimbong yang pada saat itu menjabat sebagai Kepala Wilayah Kecamatan Alla.</br>
          Pemerintahan Uwa Tahera membawahi wilayah Rantelimbong, Saluala, Balabatu, Maliba, Sangtempe, Minanga, Mandalan, sampai ke Parombean. Pemerintahan ini berlangsung hingga Tahun 1980. Setelah itu dilanjutkan oleh Andi Saripuddin sejak tahun 1980-1983 melalui penunjukan dan selanjutnya digantikan oleh Gama juga melalui penunjukan dalam periode 1983-1991, namun periodenya hanya berjalan sampai tahun 1986 karena mengundurkan diri. Dan ahirnya periode ini dilanjutkan oleh Asbar, M.BA sebagai pelaksana Tugas. Setelah periode ini selesai maka dilakukan pemilihan Kepala Desa pertama pada Tahun 1991 dengan Kepala Desa Amma Leha setelah mengalahkan Asbar, M.BA. pada periode ini terjadi pemekaran Desa Parombean dan Desa Pebaloran. Periode pemerintahan Amma Leha tidak sampai selesai disebabkan karena diangkat menjadi Lurah di Kambiolangi, dan selanjutnya diangkatlah Andi Paturusi sebagai pelaksana tugas Kepala Desa dan periodenya dilanjutkan setelah terpilih menjadi Kepala Desa divenitif melaui proses pemilihan hingga tahun 2003. Setelah masa pemerintahan Paturusi berakhir maka dilanjutkan oleh Maskur Manggau, S.Si setelah mengalahkan M. Ridwan dan Drs. Jamaluddin dalam proses pemilihan Kepala Desa. Periode ini berlangsung hingga Tahun 2009. Pada periode ini Desa Buntu Barana dipecah kedalam Enam Dusun yakni Dusun Rantelimbong, Dusun Buntu Kalosi, Dusun Buntu Ampalla, Dusun Balabatu, Dusun Maliba dan Dusun Saluala.</br>
          Setelah periode ini berakhir dilanjutkan oleh H. Takdir setelah terpilih pada Tahun 2009  yang mengalahkan Ir. Awaluddin dalam proses pemilihan yang demokratis. Periode ini berlangsung hingga bulan Maret Tahun 2015. Periode selanjutnya dijabat oleh Jamaluddin,S.Ag (Sekdes) sebagai pelaksana tugas sampai terjadi pemilihan Kepala Desa serentak berdasarkan Perundang-Undangan. Pada tahun 2015 dilakukan pemilihan Kepala Desa serentak pada bulan April yang dipimpin oleh H. Takdir Arifin, masa pemerintahannya sampai bulan Desember 2021, selanjutnya kepemerintahan dipimpin oleh Malik, A.Md untuk periode 2021-2027 setelah dilakukan lagi pemilihan Kepala Desa pada tanggal 2 Desember 2021. 
          </p>
      </div>
    </section>


    <section id="letakGeografis" class="row justfiy-content-center align-items-center my-5">
        <div class="col-md-4 p-3">
            <p class="fs-4 text-bluelight fw-bold text-center ">LETAK GEOGRAFIS</p>
            <div class="geografisText overflow-scroll rounded" style="height: 400px;">
              <p class="p-2">Desa Buntu Barana merupakan Desa induk dari beberapa Desa yang ada di Kecamatan Curio di antaranya Desa Pebaloran, Desa Parombean, dan Desa Mandalan. Namun beberapa tahun kemudian terjadi pemekaran wilayah karena mengingat kondisi wilayahnya yang sangat luas.</p>
            <ul>
              <li>
                <p class="fs-5">Letak Desa</p>
                <p>Desa Buntu Barana terletak 51 KM dari Ibukota Kabupaten Enrekang atau 15 Km dari Ibukota Kecamatan Curio dengan luas wilayah 3.794 Hektar, dengan batas-batas sebagai berikut:</p>
                <ul>
                  <li>Sebelah Utara berbatasan dengan Kabupaten Tana Toraja.</li>
                  <li>Sebelah Selatan berbatasan dengan Desa Pebaloran, Desa Curio.</li>
                  <li>Sebelah Timur berbatasan dengan Desa Parombean.</li>
                  <li>Sebelah Barat berbatasan dengan KabupatenTana Toraja</li>
                </ul>
              </li>
              <li>
                <p class="fs-5">Topologi Desa</p>
                <p>Desa Buntu Barana memiliki kondisi daerah yang berbukit-bukit, berada di atas gunung dengan ketinggian antara 806 m sampai 1098 m di atas permukaan laut. Kondisi tanah cukup subur untuk ditanami berbagai jenis tanaman,  baik tanaman jangka pendek maupun tanaman jangka panjang.</p>
              </li>
            </ul>
            </div>
        </div>
        <div class="col-md-8">
            <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18333.428564258924!2d119.90453617295283!3d-3.277474043576028!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d9409a1ed3bbf23%3A0x3e1a0bdbc9648fb6!2sBuntu%20Barana%2C%20Kec.%20Curio%2C%20Kabupaten%20Enrekang%2C%20Sulawesi%20Selatan!5e1!3m2!1sid!2sid!4v1717307157688!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>


    <section id="suku" class="row mt-3 mt-5">
        <div class="col-md-6">
            <div id="carouselExampleControls" class="carousel slide p-5" data-bs-ride="carousel">
                <div class="carousel-inner ">
                  <div class="carousel-item active">
                    <img src="img/budaya1.jpg" class="d-block w-100" height="450" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/budaya2.jpg" class="d-block w-100" height="450" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/budaya3.jpg" class="d-block w-100" height="450"    alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev ms-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next me-5" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6 p-3 d-flex flex-column justify-content-center align-items-center">
            <h3 class="fs-4 text-bold text-bluedark text-center">SUKU DURI</h3>
            <p class="text-muted text-center">Adalah suku di Desa Buntu Barana dan merupakan salah satu suku bangsa yang mendiami Kabupaten Enrekang, Provinsi Sulawesi Selatan. Permukiman suku Duri ini berbatasan dengan Kabupaten Tana Toraja. Permukiman orang Duri meliputi Kecamatan Anggeraja, Masalle, Alla, Baroko, Curio, Malua, Baraka dan Buntu Batu. Permukiman suku Duri ini berbatasan dengan Tana Toraja Duri adalah etnis yang terbesar di Kabupaten Enrekang, diikuti etnis Enrekang dan Maiwa</p>
        </div>
    </section>


</div>
@include('layout.footer')
@endsection
