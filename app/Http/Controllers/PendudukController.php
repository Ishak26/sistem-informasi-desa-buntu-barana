<?php
namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\View\View;
class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::latest();
        return view('Dashboard.datapenduduk', [
            "penduduk" => Penduduk::latest()->Search(request(['filter']))->paginate(20)
        ]);
    }
    public function tambah()
    {
        return view('Dashboard.FormPenduduk');
    }
    public function edit(Penduduk $Penduduk)
    {
        return view('Dashboard.updatependuduk', [
            "data" => $Penduduk
        ]);
    }
    public function create(request $request)
    {

        $validate = $request->validate([
            "nik" => 'required|numeric|unique:Penduduks|maxdigits:12|digits_between:7,12',
            "nama" => 'required|max:30',
            "email" => 'required|email:rfc',
            "alamat" => 'required|max:100',
            "dusun" => 'required|max:30',
            "agama" => 'required|max:30',
            "status" => 'required|Max:30',
            "hp" => 'required|numeric',
            "umur" => 'required|numeric|max_digits:3',
            "jk" => 'required|max:30',
            "tempatlahir" => 'required|max:30',
            "tanggallahir" => 'Date',
            "pendidikan" => 'required|max:30',
            "namasekolah" => 'required|max:30',
            "pekerjaan" => 'required|max:30',
            "penghasilan" => 'max_digits:30|numeric'
        ]);
        Penduduk::create($validate);
        return  redirect('/dashboard/datapenduduk')->with('sukses', 'Data Berhasil di Tambahkan!!');
    }
    public function update(Penduduk $Penduduk, Request $request)
    {
        if ($request->nik == $Penduduk->nik) {
            $validate = $request->validate([
                "nama" => 'required|max:30',
                "email" => 'required|email:dns',
                "alamat" => 'required|max:100',
                "dusun" => 'required|max:30',
                "agama" => 'required|max:30',
                "status" => 'required|max:30',
                "hp" => 'required|numeric',
                "umur" => 'required|numeric|max_digits:3',
                "jk" => 'required|max:30',
                "tempatlahir" => 'required|max:30',
                "tanggallahir" => 'Date',
                "pendidikan" => 'required|max:30',
                "namasekolah" => 'required|max:30',
                "pekerjaan" => 'required|max:30',
                "penghasilan" => 'max_digits:30|numeric'
            ]);
        } else {
            $validate = $request->validate([
                "nik" => 'required|numeric|unique',
                "nama" => 'required|max:30',
                "email" => 'required|email:dns',
                "alamat" => 'required|max:100',
                "dusun" => 'required|max:30',
                "agama" => 'required|max:30',
                "status" => 'required|max:30',
                "hp" => 'required|numeric',
                "umur" => 'required|numeric|max_digits:3',
                "jk" => 'required|max:30',
                "tempatlahir" => 'required|max:30',
                "tanggallahir" => 'Date',
                "pendidikan" => 'required|max:30',
                "namasekolah" => 'required|max:30',
                "pekerjaan" => 'required|max:30',
                "penghasilan" => 'max_digits:30|numeric'
            ]);
        }
        Penduduk::where('nik', $Penduduk->nik)
            ->update($validate);

        return  redirect('/dashboard/datapenduduk')->with('sukses', "data Berhasil Di update!!");
    }

    public function hapus(Penduduk $Penduduk)
    {
        Penduduk::destroy($Penduduk->id);
        return redirect('dashboard/datapenduduk')->with('hapus', 'DataBerhasil di hapus!!');
    }

    public function verifikasi(Request $request){
        $validate =$request->validate([
            'nik'=>'required|numeric|maxdigits:15',
            'hp'=>'required|numeric'
        ]);
        $penduduks=Penduduk::all();
        if($penduduks->firstwhere('nik','=',$validate['nik'])){
            $verifikasi =$penduduks->firstWhere('nik','=',$validate['nik']);
            if($verifikasi->nik == $validate['nik']){
                if($validate['hp']!=$verifikasi->hp){
                    return redirect('/layanan')->with('fail' ,'hp yang anda masukkan tidak sesuai!');
                }
                $request->session()->regenerate();
                $request->session()->put('penduduk',$verifikasi->nik);
                return redirect('/layanan/surat');
            }
        }
        return redirect('/layanan')->with('error' ,'Nik Yang anda masukkan tidak sesuai!');
    }
    public function mySurat(){
        if(!session('penduduk')){
            return redirect('/layanan');
        }
        $pengaju =Penduduk::firstwhere('nik','like',session('penduduk'));
        $dataSurats = $pengaju->surat;
        return view('pengajuansurat',[
            'dataSurat'=>$dataSurats,
            'pengaju' =>$pengaju,
            'title'=>'DESA BUNTU BARANA | PENGAJUAN SURAT'
        ]);
        
    }
}
