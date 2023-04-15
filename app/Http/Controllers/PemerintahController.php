<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pemerintah;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemerintahController extends Controller
{

    public function index()
    {
        return view('Dashboard.pemerintahan.pegawai', [
            "datapegawai" => Pemerintah::with('Jabatan')->get(),
            "jabatan" => Jabatan::All()
        ]);
    }
    public function tambah(Request $request)
    {
        $validasi = $request->validate([
            'nik' => 'required',
            'nama' => 'required|max:30',
            'id_jabatan' => 'required|max:30',
            'hp' => 'required',
            'alamat' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|max:30'
        ]);

        Pemerintah::create($validasi);
        return  redirect('/dashboard/pemerintah')->with('sukses', 'Data Pegawai Berhasil di tambahkan!!');
    }
    public function update(Request $request, Pemerintah $Pemerintah)
    {
        $rules = $request->validate([
            'nik' => 'required|unique:Pemerintah',
            'nama' => 'required|max:30',
            'id_jabatan' => 'required|max:30',
            'hp' => 'required',
            'alamat' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|max:30'
        ]);

        if ($request->nik == $Pemerintah->nik) {
            Arr::except($rules, ['nik']);
        }
        Pemerintah::where('nik', $Pemerintah->nik)->update($rules);
        return redirect('/dashboard/pemerintah')->with('edit', 'Data berhasil di Edit');
    }
    public function hapus(Pemerintah $Pemerintah)
    {
        Pemerintah::destroy($Pemerintah->id);
        return redirect('/dashboard/pemerintah')->with('hapus', 'Data berhasil di hapus');
    }
}
