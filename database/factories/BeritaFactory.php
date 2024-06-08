<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //     return [
    //         'judul' => fake()->sentence(mt_rand(7, 8)),
    //         'category_id' => mt_rand(1, 3),
    //         // 'gambar'=>fake()->randomElement(['ALBUM.jpg','ALBUM1.jpg','ALBUM2.jpg','ALBUM3.jpg','ALBUM4.jpg']),
    //         'slug' => fake()->unique()->word(),
    //         'deskripsi' => fake()->paragraph(mt_rand(4, 7)),
    //         'time' => fake()->dateTime()
    //     ];
    // }
        public function definition()
        {
            return[
                'judul'=>"Banjir Setinggi 1 Meter Terjang Enrekang, Jalan Poros ke Sidrap Terputus",
                'category_id'=>1,
                'gambar'=>"img/banjir-menerjang-kecamatan-kabere-enrekang_169.jpeg",
                'slug'=>"Banjir-Setinggi-1-Meter-Terjang-Enrekang-Jalan-Poros-ke-Sidrap-Terputus",
                'deskripsi'=>"Banjir setinggi satu meter menerjang Kabupaten Enrekang, Sulawesi Selatan (Sulsel). Bencana ini mengakibatkan Jalan Poros Enrekang-Sidrap terputus karena tidak bisa dilalui kendaraan.
                Benar kami dapat laporan, di Kabere banjir,kata Kepala BPBD Enrekang Arsil Bagenda kepada detikSulsel, Minggu (2/6/2024).
                Arsil mengungkapkan, banjir terjadi tepatnya di Desa Kabere, Kecamatan Cendana, Enrekang, Minggu (2/6) sekitar pukul 20.00 Wita. Banjir terjadi akibat tingginya intensitas hujan yang membuat air sungai meluap.Hujan memang terus. Bukan air bah juga, cuma sungai mungkin tidak bisa lagi menampung volume air yang tinggi jadi meluap ke pemukiman dan jalan poros Dia mengutarakan, ketinggian banjir hingga setinggi perut orang dewasa. Hal itu membuat Jalan Poros Enrekang-Sidrap-Pinrang lumpuh tidak bisa dilintasi kendaraan Tingginya 1 meteran lah, perut orang dewasa. Sementara belum bisa diakses. Tapi menurut laporan air sementara ini mulai surut",
                'time'=>fake()->dateTime()
            ];
        }
}
