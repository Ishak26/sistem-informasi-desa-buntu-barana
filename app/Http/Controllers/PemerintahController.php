<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pemerintah;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
class PemerintahController extends Controller
{
    public function index()
    {
        if (!Gate::any(['sekertaris','kasipemerintahan'])){
            abort(403);
        }
        return view('Dashboard.pemerintahan.pegawai', [
            "datapegawai" => Pemerintah::all(),
        ]);
    }
    public function tambah(Request $request)
    {
        $this->authorize('sekertaris');
        $validasi = $request->validate([
            'foto'=>'required|file',
            'nip' => 'required|unique:Pemerintahs',
            'nama' => 'required|max:30',
            'jabatan' => 'required|max:30',
            'hp' => 'required',
            'alamat' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|max:30'
        ]);
        $validasi['foto']=$request->file('foto')->store('img-foto-pegawai');
        Pemerintah::create($validasi);
        return  redirect('/dashboard/pemerintah')->with('sukses', 'Data Pegawai Berhasil di tambahkan!!');
    }
    public function update(Request $request, Pemerintah $Pemerintah)
    {
        $this->authorize('sekertaris');
        
        $rules = $request->validate([
            'nik' => 'required',
            'nama' => 'required|max:30',
            'jabatan' => 'required|max:30',
            'hp' => 'required',
            'alamat' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|max:30'
        ]);
        if ($request->nik == $Pemerintah->nik) {
            Arr::except($rules, $rules['nik']);
        }
        Pemerintah::where('nik', $Pemerintah->nik)->update($rules);
        return redirect('/dashboard/pemerintah')->with('edit', 'Data berhasil di Edit');
    }
    public function hapus(Pemerintah $Pemerintah)
    {
        Gate::any(['sekertaris','kasipemerintahan']);
        Pemerintah::destroy($Pemerintah->id);
        return redirect('/dashboard/pemerintah')->with('hapus', 'Data '.$Pemerintah->nama.' berhasil di hapus');
    }
}
