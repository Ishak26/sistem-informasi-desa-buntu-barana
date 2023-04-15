<?php

use App\Models\Kades;
use App\Models\berita;
use App\Models\Penduduk;
use App\Models\Pemerintah;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PemerintahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login

Route::get('/login', function () {
    return view('login.login',);
})->middleware('guest')->name('login');
Route::get('/registrasi', function () {
    return view('login.registrasi');
})->middleware('auth');
Route::post('/registrasi', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard/logout', [LoginController::class, 'logout']);



// user
Route::get('/', function () {
    return view('home', [
        "title" => "Desa XYz | Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "Desa XYz | Tentang",
        'kades' => Kades::first()
    ]);
});
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show']);
Route::get('/category/{category:slug}', [CategoryController::class, 'index']);

// testing
Route::get('beritas', function () {
    return view('beritas');
});


// Route Dashboard
Route::get('/dashboard', function () {
    return view('Dashboard.dashboard', [
        "penduduk" => Penduduk::all(),
        "pegawai" => Pemerintah::all(),
        "lakilaki" => Penduduk::where('jk', 'laki-laki')->get(),
        "berita" => berita::all(),
        'kades' => Kades::first()

    ]);
})->middleware('auth');
// Bagian Data Berita
Route::get('/databerita', [BeritaController::class, 'store'])->middleware('auth');
Route::get('/formberita', [BeritaController::class, 'tambah'])->middleware('auth');
Route::post('/formberita', [BeritaController::class, 'create'])->middleware('auth');
Route::get('/databerita/{berita:slug}/updatedataberita', [BeritaController::class, 'edit'])->middleware('auth');
Route::put('/updatedataberita/{berita:slug}', [BeritaController::class, 'update'])->middleware('auth');
Route::delete('/databerita/{berita:slug}', [BeritaController::class, 'destroy'])->middleware('auth');

// bagian data penduduk
Route::get('/dashboard/datapenduduk', [PendudukController::class, 'index'])->middleware('auth');
Route::get('/dashboard/formpenduduk', [PendudukController::class, 'tambah'])->middleware('auth');
Route::get('/dashboard/datapenduduk/{Penduduk:nik}/updatependuduk', [PendudukController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/updatependuduk/{Penduduk:nik}', [PendudukController::class, 'update'])->middleware('auth');
Route::post('/dashboard/datapenduduk', [PendudukController::class, 'create'])->middleware('auth');
Route::delete('/dashboard/datapenduduk/{Penduduk:nik}', [PendudukController::class, 'hapus'])->middleware('auth');

// bagian data pegawai pemerintah
Route::get('/dashboard/pemerintah', [PemerintahController::class, 'index']);
Route::post('/dashboard/pemerintah', [PemerintahController::class, 'tambah']);
Route::put('/dashboard/pemerintah/{Pemerintah:nik}', [PemerintahController::class, 'update']);
Route::delete('/dashboard/pemerintah/{Pemerintah:nik}', [PemerintahController::class, 'hapus']);

// // bagian data mahasiswa
// Route::get('/dashboard/mahasiswa', [MahasiswaController::class, 'index']);
// Route::post('/dashboard/mahasiswa', [MahasiswaController::class, 'create']);

// edit profil kades
Route::put('/dashboard/editkades/{Kades}', [KadesController::class, 'edit']);

// bagian album
Route::get('/album', [AlbumController::class, 'index']);
Route::get('/dashboard/tambahalbum',[AlbumController::class,'view']);
Route::post('/dashboard/album',[AlbumController::class,'tambahfoto']);

// bagian komentar
Route::post('/album/komentar',[AlbumController::class,'komentar']);