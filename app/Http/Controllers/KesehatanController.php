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
            "data"=>Kesehatan::all()
        ]);
    }
    public function tambah(Request $request){
        $validasi=$request->validate([
            'penduduk_id'=> 'bail|unique:Kesehatans|numeric',
            'guladarah'=>'required|numeric|maxdigits:3',
            'tinggi'=>'required|numeric|maxdigits:3',
            'tekanan'=>'required|numeric|maxdigits:3',
            'berat'=>'required|numeric|maxdigits:3',
            'riwayatpenyakit'=>'required|string',
            'golongandarah'=>'required|string'

        ],[
            'penduduk_id.unique'=>'Data sudah ada, Silahkan update data yang sudah tersedia!!'
        ]);
        Kesehatan::create($validasi);
        return back()->with('noted','Data berhasil ditambahkan!');
    }

    public function update(Kesehatan $kesehatan,Request $request){
        $validasi=$request->validate([
            'guladarah'=>'required|numeric|maxdigits:3',
            'tinggi'=>'required|numeric|maxdigits:3',
            'tekanan'=>'required|numeric|maxdigits:3',
            'berat'=>'required|numeric|maxdigits:3',
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

