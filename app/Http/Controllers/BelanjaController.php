<?php

namespace App\Http\Controllers;

use App\Models\Program_Kerja;
use App\Models\Belanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        return back()->with('sukses','Data belanjaan berhasil ditambahkan!');

    }

    public function verifikasiBelanja(Belanja $belanja){
        if (!Gate::any(['sekertaris','kasipemerintahan'])) {
            abort(404);
          }
        $belanja->update(['verifikasi'=>1]);
        return back()->with('sukses',$belanja->Belanja.' Data belanjaan berhasil di verifikasi');
    }

}
