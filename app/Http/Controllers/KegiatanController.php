<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function publicView(){
        return view('kegiatan',[
            'datas'=> Kegiatan::all(),
            'title' => 'DESA BUNTU BARANA | kegiatan',
            'latest'=>Kegiatan::orderBy('created_at', 'desc')->get()
        ]);
    }
    public function index(){
        $kegiatan = new Kegiatan();
        return view('dashboard.kegiatan',[
            'fieldTable'=>$kegiatan->fieldTable(),
            'datas'=>Kegiatan::all()
        ]);
    }
    public function tambah(Request $request){
        $validasi = $request->validate([
            'gambar' =>'file|image',
            'perihal'=>'required',
            'tanggal'=>'required|date',
            'jam' => 'required',
            'tempat' => 'required'
        ]);
        if($validasi['gambar']){
            $validasi['gambar']= $request->file('gambar')->store('img-gambar-kegiatan');
        }

        Kegiatan::create($validasi);
        return back()->with('sukses','Daftar Kegiatan Berhasil di Tambahkan');
    }
    public function hapus(Kegiatan $kegiatan){
        try {
            $kegiatan->delete();
        } catch (\Throwable $th) {
            return back()->with('error',$th);
        }
        return back()->with('sukses','data berhasil di hapus');
    }
}
