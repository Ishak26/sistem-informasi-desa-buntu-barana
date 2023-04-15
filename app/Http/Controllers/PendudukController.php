<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $penduduk = Penduduk::latest();
        if (request('filter')) {
            $penduduk->where('nik', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('nama', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('alamat', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('dusun', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('agama', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('jk', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('pendidikan', 'LIKE', '%' . request('filter') . '%')
                ->orWhere('pekerjaan', 'LIKE', '%' . request('filter') . '%');
        }
        return view('Dashboard.datapenduduk', [
            "penduduk" => $penduduk->paginate(20)
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
            "nik" => 'required|numeric|unique:Penduduks',
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
}
