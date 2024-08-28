<?php
use App\Http\Controllers\KesehatanController;
use App\Models\Kesehatan;
use App\Models\Kades;
use App\Models\berita;
use App\Models\Penduduk;
use App\Models\Pemerintah;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KadesController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\keuanganController;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\KritikSaranController;
use App\Models\Jabatan;
use App\Models\Kegiatan;
use App\Models\KritikSaran;
use Illuminate\Http\Request;

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
Route::get('/dashboard/logout', [LoginController::class,'logout']);

// ROUTE DATA SURAT
Route::get('/layanan/surat/keluar',function(){
    session()->flush();
    return redirect('/layanan');
});
Route::get('/dashboard/surat',[SuratController::class,'surat']);
Route::get('dashboard/surat/{surat:id}/verifikasi',[SuratController::class,'buatSurat']);
Route::post('/dashboard/surat/cetak',[SuratController::class,'cetakSurat']);
Route::get('/layanan/surat',[PendudukController::class,'mySurat']);
Route::post('/layanan/surat',[PendudukController::class,'verifikasi']);
Route::post('/layanan/pengajuansurat',[SuratController::class,'pengajuan']);

// user
Route::get('/', function () {
    return view('home', [
        "title" => "Desa Buntu Barana | Home"
    ]);
});
Route::get('/tentang', function () {
    return view('tentang', [
        "title" => "Desa Buntu Barana | Tentang",
        'kades' => Kades::first(),
        'dataPegawai'=>Pemerintah::all(),
    ]);
    })->name('tentang');
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show']);
Route::get('/category/{category:slug}', [CategoryController::class, 'index']);

Route::get('layanan', function () {
    return view('layanan',[
        'title'=> 'Desa Buntu Barana | Layanan'
    ]);
});
Route::get('/info/keuangan',[KeuanganController::class,'index']);

// Route Dashboard
Route::get('/dashboard', function () {
    return view('Dashboard.dashboard', [
        "penduduk" => Penduduk::all(),
        "pegawai" => Pemerintah::all(),
        "lakilaki" => Penduduk::where('jk', 'laki-laki')->get(),
        "berita" => berita::all(),
        'kades' => Kades::first(),
    ]);
})->middleware('auth');

//route data program kerja
Route::get('/dashboard/programkerja',[ProgramKerjaController::class,'index'])->middleware('auth')->name('dataProker');
Route::post('/dashboard/programkerja/ajuanproker',[ProgramKerjaController::class,'tambah'])->middleware('auth');
Route::put('/dashboard/programkerja/verifikasi/{Program_Kerja:id}',[ProgramKerjaController::class,'verifikasi'])->middleware('auth');
Route::put('/dashboard/programkerja/edit/{id}',[ProgramKerjaController::class,'edit'])->middleware('auth');
Route::delete('/dashboard/programkerja/hapus/{program_Kerja}',[ProgramKerjaController::class,'hapus'])->middleware('auth');

// route pendapatan
Route::get('/dashboard/pendapatan',[PendapatanController::class,'index'])->middleware('auth');
Route::post('/dashboard/pendapatan/tambah',[PendapatanController::class,'tambah'])->middleware('auth');

// route belanja
Route::get('/dashboard/programkerja/belanja/{Program_Kerja:id}',[BelanjaController::class,'index'])->middleware('auth');
Route::POST('/dashboard/programkerja/belanja/tambah',[BelanjaController::class,'tambah'])->middleware('auth');
Route::POST('/dashboard/programkerja/belanja/{belanja:id}/verifikasi',[BelanjaController::class,'verifikasiBelanja'])->middleware('auth');
// route data login akun
Route::put('/dashboard/loginprofil',[LoginController::class,'updateData'])->middleware('auth');

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

// bagian data bantuan
Route::get('/dashboard/databantuan',[BantuanController::class, 'index'])->middleware('auth');
Route::post('/dashboard/databantuan',[BantuanController::class, 'tambah'])->middleware('auth');
Route::get('/dashboard/databantuan/{bantuan:id}/penerima',[BantuanController::class, 'penerima'])->middleware('auth');
Route::post('/dashboard/bantuan/penerima/filterpenduduk', [BantuanController::class, 'filter'])->middleware('auth');

// bagian data pegawai pemerintah
Route::middleware('auth')->group(function(){
    Route::get('/dashboard/pemerintah', [PemerintahController::class, 'index']);
    Route::post('/dashboard/pemerintah', [PemerintahController::class, 'tambah']);
    Route::put('/dashboard/pemerintah/{pemerintah:nip}/update', [PemerintahController::class, 'update']);
    Route::delete('/dashboard/pemerintah/{pemerintah:nip}', [PemerintahController::class, 'hapus']);    
});

// data kesehatan
Route::get('/dashboard/dataajax/{nik}', function($nik){
    $data = Penduduk::where('nik',$nik)->get();
    return response()->json($data);
});
Route::get('/dashboard/kesehatan',[KesehatanController::class,'index'])->middleware('auth');
Route::post('/dashboard/kesehatan/tambah',[KesehatanController::class,'tambah'])->middleware('auth');
Route::put('/dashboard/kesehatan/update/{kesehatan}',[KesehatanController::class,'update'])->middleware('auth');
Route::delete('/dashboard/kesehatan/{kesehatan}',[KesehatanController::class,'hapus'])->middleware('auth');

// edit profil kades
Route::put('/dashboard/editkades/{Kades}', [KadesController::class, 'edit'])->middleware('auth');
// bagian album
Route::get('/dokumentasi', [AlbumController::class, 'index']);
Route::get('/dashboard/tambahalbum',[AlbumController::class,'view'])->middleware('auth');
Route::post('/dashboard/album',[AlbumController::class,'tambahfoto'])->middleware('auth');
Route::delete('/dashboard/album/delete/{album}',[AlbumController::class,'hapus'])->middleware('auth');

// bagian komentar
Route::post('/album/komentar',[AlbumController::class,'komentar']);
// kritik dan saran
Route::post('/layanan/kritik',[KritikSaranController::class,'tambah']);
Route::get('/kegiatan',[KegiatanController::class,'publicView']);
Route::get('/dashboard/kegiatan',[KegiatanController::class,'index'])->middleware('auth');
Route::post('/dashboard/tambahkegiatan',[KegiatanController::class,'tambah'])->middleware('auth');
Route::delete('/dashboard/hapuskegiatan/{kegiatan}',[KegiatanController::class,'hapus'])->middleware('auth');