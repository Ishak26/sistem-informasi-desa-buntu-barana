<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pemerintah;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
class PemerintahController extends Controller
{
    public function index()
    {
        if (!Gate::any(['sekertaris','kasipemerintahan'])){
            abort(403);
        }
        return view('Dashboard.pemerintahan.pegawai', [
            "datapegawai" => Pemerintah::all(),
            "fielddata"=>Pemerintah::fieldColomns(),
        ]);
    }
    public function tambah(Request $request)
    {
        $validasi = $request->validate([
            'foto'=>'required|file',
            'nip' => 'required|unique:Pemerintahs|max_digits:16',
            'nama' => 'required|max:30|string',
            'jabatan' => 'required|max:30|string',
            'hp' => 'required|numeric',
            'alamat' => 'required',
            'tanggallahir' => 'required|date',
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
            'foto'=>'image:jpg, jpeg,png',
            'nip' => 'required',
            'nama' => 'required|max:30',
            'jabatan' => 'required|max:30',
            'hp' => 'required',
            'alamat' => 'required',
            'tanggallahir' => 'required',
            'jeniskelamin' => 'required|max:30'
        ]);
        if($request->foto){
            Storage::delete($Pemerintah->foto);
            $rules['foto']=$request->file('foto')->store('img-foto-pegawai');
        }
        if ($request->nip == $Pemerintah->nip) {
            Arr::except($rules, $rules['nip']);
        }
        Pemerintah::where('nip', $Pemerintah->nip)->update($rules);
        return redirect('/dashboard/pemerintah')->with('edit', 'Data berhasil di update');
    }
    public function hapus(Pemerintah $Pemerintah)
    {
        Gate::any(['sekertaris','kasipemerintahan']);
        Storage::delete($Pemerintah->foto);
        Pemerintah::destroy($Pemerintah->id);
        return redirect('/dashboard/pemerintah')->with('hapus', 'Data '.$Pemerintah->nama.' berhasil di hapus');
    }
}
