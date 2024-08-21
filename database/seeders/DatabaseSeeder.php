<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kades;
use App\Models\Login;
use App\Models\berita;
use App\Models\Jabatan;
use App\Models\category;
use App\Models\Penduduk;
use App\Models\Pemerintah;
use App\Models\DataPenduduk;
use App\Models\Program_Kerja;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // login user
        Login::create([
        'username'=>'sekertaris',
        'email' => 'sekertaris@gmail.com',
        'bidang'=>'SEKERTARIS',
        'password'=>bcrypt('12345')
        ]);
        Login::create([
            'username'=>'kasikesra',
            'email' => 'kasikesra@gmail.com',
            'bidang'=>'KASI KESEJAHTERAAN MASYARAKAT',
            'password'=>bcrypt('12345')
        ]);
        Login::create([
            'username'=>'kasikemasyarakatan',
            'email' => 'kasikemasyarakatan@gmail.com',
            'bidang'=>'KASI KEMASYARAKATAN',
            'password'=>bcrypt('12345')
        ]);
        Login::create([
        'username'=>'kasipemerintahan',
        'email' => 'kasipemerintahan@gmail.com',
        'bidang'=>'KASI PEMERINTAHAN',
        'password'=>bcrypt('12345')
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DataPenduduk::factory(10)->create();
        // Program_Kerja::factory(30)->create();
        // Penduduk::factory(100)->create();
        // berita::factory(30)->create();
        berita::create([
            'judul'=>"Banjir Setinggi 1 Meter Terjang Enrekang, Jalan Poros ke Sidrap Terputus",
            'category_id'=>1,
            'gambar'=>"img/banjir-menerjang-kecamatan-kabere-enrekang_169.jpeg",
            'slug'=>"Banjir-Setinggi-1-Meter-Terjang-Enrekang-Jalan-Poros-ke-Sidrap-Terputus",
            'deskripsi'=>"Banjir setinggi satu meter menerjang Kabupaten Enrekang, Sulawesi Selatan (Sulsel). Bencana ini mengakibatkan Jalan Poros Enrekang-Sidrap terputus karena tidak bisa dilalui kendaraan.
            Benar kami dapat laporan, di Kabere banjir,kata Kepala BPBD Enrekang Arsil Bagenda kepada detikSulsel, Minggu (2/6/2024).
            Arsil mengungkapkan, banjir terjadi tepatnya di Desa Kabere, Kecamatan Cendana, Enrekang, Minggu (2/6) sekitar pukul 20.00 Wita. Banjir terjadi akibat tingginya intensitas hujan yang membuat air sungai meluap.Hujan memang terus. Bukan air bah juga, cuma sungai mungkin tidak bisa lagi menampung volume air yang tinggi jadi meluap ke pemukiman dan jalan poros Dia mengutarakan, ketinggian banjir hingga setinggi perut orang dewasa. Hal itu membuat Jalan Poros Enrekang-Sidrap-Pinrang lumpuh tidak bisa dilintasi kendaraan Tingginya 1 meteran lah, perut orang dewasa. Sementara belum bisa diakses. Tapi menurut laporan air sementara ini mulai surut",
            'time'=>"2000-06-17 07:53:16",
        ]);
        berita::create([
            'judul'=>"Banjir Setinggi 1 Meter Terjang Enrekang, Jalan Poros ke Sidrap Terputus",
            'category_id'=>1,
            'gambar'=>"img/banjir-menerjang-kecamatan-kabere-enrekang_169.jpeg",
            'slug'=>"Banjir-Setinggi-1-Meter-Terjang-Enrekang-Jalan-Poros-ke-Sidrap-Terputus",
            'deskripsi'=>"Banjir setinggi satu meter menerjang Kabupaten Enrekang, Sulawesi Selatan (Sulsel). Bencana ini mengakibatkan Jalan Poros Enrekang-Sidrap terputus karena tidak bisa dilalui kendaraan.
            Benar kami dapat laporan, di Kabere banjir,kata Kepala BPBD Enrekang Arsil Bagenda kepada detikSulsel, Minggu (2/6/2024).
            Arsil mengungkapkan, banjir terjadi tepatnya di Desa Kabere, Kecamatan Cendana, Enrekang, Minggu (2/6) sekitar pukul 20.00 Wita. Banjir terjadi akibat tingginya intensitas hujan yang membuat air sungai meluap.Hujan memang terus. Bukan air bah juga, cuma sungai mungkin tidak bisa lagi menampung volume air yang tinggi jadi meluap ke pemukiman dan jalan poros Dia mengutarakan, ketinggian banjir hingga setinggi perut orang dewasa. Hal itu membuat Jalan Poros Enrekang-Sidrap-Pinrang lumpuh tidak bisa dilintasi kendaraan Tingginya 1 meteran lah, perut orang dewasa. Sementara belum bisa diakses. Tapi menurut laporan air sementara ini mulai surut",
            'time'=>"2000-06-17 07:53:16",
        ]);
        berita::create([
            'judul'=>"Banjir Setinggi 1 Meter Terjang Enrekang, Jalan Poros ke Sidrap Terputus",
            'category_id'=>1,
            'gambar'=>"img/banjir-menerjang-kecamatan-kabere-enrekang_169.jpeg",
            'slug'=>"Banjir-Setinggi-1-Meter-Terjang-Enrekang-Jalan-Poros-ke-Sidrap-Terputus",
            'deskripsi'=>"Banjir setinggi satu meter menerjang Kabupaten Enrekang, Sulawesi Selatan (Sulsel). Bencana ini mengakibatkan Jalan Poros Enrekang-Sidrap terputus karena tidak bisa dilalui kendaraan.
            Benar kami dapat laporan, di Kabere banjir,kata Kepala BPBD Enrekang Arsil Bagenda kepada detikSulsel, Minggu (2/6/2024).
            Arsil mengungkapkan, banjir terjadi tepatnya di Desa Kabere, Kecamatan Cendana, Enrekang, Minggu (2/6) sekitar pukul 20.00 Wita. Banjir terjadi akibat tingginya intensitas hujan yang membuat air sungai meluap.Hujan memang terus. Bukan air bah juga, cuma sungai mungkin tidak bisa lagi menampung volume air yang tinggi jadi meluap ke pemukiman dan jalan poros Dia mengutarakan, ketinggian banjir hingga setinggi perut orang dewasa. Hal itu membuat Jalan Poros Enrekang-Sidrap-Pinrang lumpuh tidak bisa dilintasi kendaraan Tingginya 1 meteran lah, perut orang dewasa. Sementara belum bisa diakses. Tapi menurut laporan air sementara ini mulai surut",
            'time'=>"2000-06-17 07:53:16",
        ]);

        Kades::create([
            'nama' => 'mr . XYZ s.kom',
            'foto'=>'no-profil.jpg',
            'visi'=> 'MEWUJUDKAN DESA BUNTU BARANA LEBIH MAJU, MANDIRI DAN RELIGIUS MELALUI PEMBANGUNAN PARTISIPATIF DAN TATA KELOLA PEMERINTAHAN YANG BAIK',
            'misi'=> ' Meningkatkan pembangunan infrastruktur pedesaaan secara partisipatif,Meningkatkan akuntabilitas pemerintahan dan optimalisasi pelayanan publik,Meningkatkan pengembangan usaha ekonomi produktif masyarakat,Meningkatkan kesejahteraan sosial masyarakat, Meningkatkan kualitas dan perluasan layanan kesehatan dan pendidikan anak,Memelihara nilai-nilai agama, sosial dan budaya masyarakat'
        ]);

        category::create([
            'category' => 'politik'
        ]);

        category::create([
            'category' => 'Ekonomi dan bisnis'
        ]);

        category::create([
            'category' => 'Kriminal'
        ]); 
        category::create([
            'category' => 'Pendidikan'
        ]); 
        category::create([
            'category' => 'Lokal'
        ]);
    }
}
