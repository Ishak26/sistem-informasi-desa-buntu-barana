<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Gate;

class KesehatanController extends Controller
{
    public function index(){
        if (!Gate::any(['sekertaris','kasikesra'])) {
            abort(403);
        }
        return view('Dashboard.pemerintahan.datakesehatan',[
            "data"=>Kesehatan::paginate(30)
        ]);
    }
    public function tambah(Request $request){
        $validasi=$request->validate([
            'penduduk_id'=> 'required|numeric|bail|unique:kesehatans|max_digits:3',
            'guladarah'=>'required|numeric|max_digits:3',
            'tinggi'=>'required|numeric|max_digits:3',
            'tekanan'=>'required|numeric|max_digits:3',
            'berat'=>'required|numeric|max_digits:3',
            'riwayatpenyakit'=>'required|string',
            'golongandarah'=>'required|string|max:2'

        ],[
            'penduduk_id.unique'=>'Data sudah ada, Silahkan update data yang sudah tersedia!!',
            'penduduk_id.required'=>'NIK penduduk tidak di temukan!!'
        ]);
        Kesehatan::create($validasi);
        return back()->with('sukses','Data berhasil ditambahkan!');
    }

    public function update(Kesehatan $kesehatan,Request $request){
        $validasi=$request->validate([
            'guladarah'=>'required|numeric|max_digits:3',
            'tinggi'=>'required|numeric|max_digits:3',
            'tekanan'=>'required|numeric|max_digits:3',
            'berat'=>'required|numeric|max_digits:3',
            'riwayatpenyakit'=>'required|string',
            'golongandarah'=>'required|max:2|string'
        ]);
        Kesehatan::where('id',$kesehatan->id)->update($validasi);
        return back()->with('update','Data di Perbaharui!!');
    }
    
    public function hapus(Kesehatan $kesehatan){
        Kesehatan::destroy($kesehatan->id);
        return back()->with('hapus','data kesehatan telah di hapus!!');
    }



}

