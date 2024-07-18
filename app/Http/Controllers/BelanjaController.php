<?php

namespace App\Http\Controllers;

use App\Models\Program_Kerja;
use App\Models\Belanja;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index(Program_Kerja $Program_Kerja){
        $belanja =Belanja::Where('Programkerja_id',$Program_Kerja->id)->get();
        return view('Dashboard.pemerintahan.belanja',[
            'proker' => $Program_Kerja,
            'Belanja'=> $belanja
        ]);
    }
    public function tambah(Request $request){
        $validasi = $request->validate([
            'ProgramKerja_id'=> 'required|numeric|maxdigits:7',
            'Belanja'=>'required|max:200',
            'Jumlah_satuan'=>'required|numeric|maxdigits:7',
            'harga'=>'required|numeric|maxdigits:20',
            'total_harga'=>'required|numeric',
            'Bukti_belanja'=>'required|file|mimes:jpg,png,jpeg',
        ]);
        if($request->file('Bukti_belanja')){
            $validasi['Bukti_belanja']=$request->file('Bukti_belanja')->store('file-bukti-belanja');
        }
        Belanja::create($validasi);
        return back()->with('berhasil','Data Berhasil Di Tambahkan');

    }
}
