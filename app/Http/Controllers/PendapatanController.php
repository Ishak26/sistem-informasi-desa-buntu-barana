<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Belanja;
use App\Models\Program_Kerja;
use Illuminate\Support\Facades\Gate;
class PendapatanController extends Controller
{
    public function index(){
        if(!Gate::any(['sekertaris','kasipemerintahan','kepaladesa'])){
            abort(403);
        }
        $pendapatan=Pendapatan::all();
        $pengeluaran=Belanja::all();
        $proker=Program_Kerja::where('Verifikasi_sekertaris','like',1)->where('Verifikasi_KepalaDesa','like',1)->get();
        return view('Dashboard.pemerintahan.pendapatan',[
            'data'=>$pendapatan,
            'pengeluaran'=>$pengeluaran,
            'proker'=>$proker
        ]);
    }
    public function tambah(Request $request){
        $validasi = $request->validate([
            'Keterangan' => 'required|max:300',
            'nominal' =>'required|maxdigits:11',
            'tahunanggaran' =>'required|maxdigits:4',
            'sumberdana'=>'required|max:50',
        ]);
        Pendapatan::create($validasi);
        return back()->with('sukses','Data berhasil di tambahkan!');
    }
}
