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
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PemerintahController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ProgramKerjaController;
use App\Models\Jabatan;
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

Route::post('/about/surat',[SuratController::class,'surat']
);



// user
Route::get('/', function () {
    return view('home', [
        "title" => "Desa XYz | Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "Desa Buntu Barana | Tentang",
        'kades' => Kades::first()
    ]);
})->name('about');
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show']);
Route::get('/category/{category:slug}', [CategoryController::class, 'index']);

// testing
Route::get('beritas', function () {
    return view('beritas');
});

Route::get('layanan', function () {
    return view('layanan',[
        'title'=> 'Desa Buntu Barana | Layanan'
    ]);
});


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

// route pendapatan
Route::get('/dashboard/pendapatan',[PendapatanController::class,'index'])->middleware('auth');
Route::post('/dashboard/pendapatan/tambah',[PendapatanController::class,'tambah'])->middleware('auth');

// route belanja
Route::get('/dashboard/programkerja/belanja/{Program_Kerja:id}',[BelanjaController::class,'index'])->middleware('auth');
Route::POST('/dashboard/programkerja/belanja/tambah',[BelanjaController::class,'tambah'])->middleware('auth');

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
Route::get('/dashboard/databantuan',[PendudukController::class, 'bantuan'])->middleware('auth');

// bagian data pegawai pemerintah
Route::middleware('auth')->group(function(){
    Route::get('/dashboard/pemerintah', [PemerintahController::class, 'index']);
    Route::post('/dashboard/pemerintah', [PemerintahController::class, 'tambah']);
    Route::put('/dashboard/pemerintah/{Pemerintah:nik}', [PemerintahController::class, 'update']);
    Route::delete('/dashboard/pemerintah/{Pemerintah:nik}', [PemerintahController::class, 'hapus']);    
});

// data kesehatan
Route::get('/dashboard/dataajax/{nik}', function($nik){
    $data = Penduduk::where('nik',$nik)->get();
    return response()->json($data);
});
Route::get('/dashboard/kesehatan',[KesehatanController::class,'index'])->middleware('auth');
Route::post('/dashboard/kesehatan/tambah',[KesehatanController::class,'tambah'])->middleware('auth');
Route::put('/dashboard/kesehatan/update/{kesehatan}',[KesehatanController::class,'update'])->middleware('auth');
Route::put('/dashboard/kesehatan/{kesehatan}',[KesehatanController::class,'update'])->middleware('auth');

// edit profil kades
Route::put('/dashboard/editkades/{Kades}', [KadesController::class, 'edit']);
// bagian album
Route::get('/album', [AlbumController::class, 'index']);
Route::get('/dashboard/tambahalbum',[AlbumController::class,'view'])->middleware('auth');
Route::post('/dashboard/album',[AlbumController::class,'tambahfoto']);

// bagian komentar
Route::post('/album/komentar',[AlbumController::class,'komentar']);