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
        'username'=>'ishak',
        'email' => 'izhakmahyuddin@gmail.com',
        'password'=>bcrypt('12345')
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // DataPenduduk::factory(10)->create();
        Penduduk::factory(100)->create();
        berita::factory(30)->create();
        // category::factory(3)->create();

        // berita::create([
        //     'category'=>'olahraga',
        //     'judul' => 'Judul Pertama',
        //     'gambar'=>'ALBUM.jpg',
        //     'slug'=>'judul-pertama',
        //     'excerpt'=>'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odio cumque esse ratione repellendus nulla autem a. Sit autem quas sequi excepturi ipsum laboriosam eum, omnis ex suscipit, temporibus, numquam distinctio.',
        //     'deskripsi'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita assumenda deserunt, autem facilis placeat nam illum! Tenetur perferendis possimus laborum sit, impedit ea, sed soluta quisquam quae quis iure aperiam in aliquam numquam quaerat. Nihil quaerat mollitia sunt cupiditate inventore, ab officiis commodi praesentium? Repellat eum sint saepe minus rerum.'



        // ]);
        // kades
        Kades::create([
            'nama' => 'mr . XYZ s.kom',
            'foto'=>'no-profil.jpg',
            'visi'=> 'MEWUJUDKAN DESA CILEUNYI KULON LEBIH MAJU, MANDIRI DAN RELIGIUS MELALUI PEMBANGUNAN PARTISIPATIF DAN TATA KELOLA PEMERINTAHAN YANG BAIK',
            'misi'=> ' Meningkatkan pembangunan infrastruktur pedesaaan secara partisipatif,Meningkatkan akuntabilitas pemerintahan dan optimalisasi pelayanan publik,Meningkatkan pengembangan usaha ekonomi produktif masyarakat,Meningkatkan kesejahteraan sosial masyarakat, Meningkatkan kualitas dan perluasan layanan kesehatan dan pendidikan anak,Memelihara nilai-nilai agama, sosial dan budaya masyarakat'
        ]);

        category::create([
            'category' => 'Acara'
        ]);

        category::create([
            'category' => 'Gotong Royong'
        ]);

        category::create([
            'category' => 'Olahraga'
        ]); 
        Jabatan::create([
            'jabatan' => "KEPALA DESA"
        ]);
        Jabatan::create([
            'jabatan' => "SEKERTARIS DESA"
        ]);

        Jabatan::create([
            'jabatan' => "STAF KEUANGAN DESA"
        ]);

        Jabatan::create([
            'jabatan' => "STAF PERENCANAAN DESA"
        ]);
        Jabatan::create([
            'jabatan' => "STAF UMUM DESA"
        ]);
        Jabatan::create([
            'jabatan' => "STAF KEPENDUDUKAN DESA"
        ]);
    }
}
