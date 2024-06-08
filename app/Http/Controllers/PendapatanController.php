<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pendapatan;
use App\Models\Belanja;
use Illuminate\Support\Facades\Gate;
class PendapatanController extends Controller
{
    public function index(){
        if(!Gate::any(['sekertaris','kasipemerintahan','kepaladesa'])){
            abort(403);
        }
        $data=Pendapatan::all();
        $pengeluaran=Belanja::all();
        return view('Dashboard.pemerintahan.pendapatan',[
            'data'=>$data,
            'pengeluaran'=>$pengeluaran
        ]);
    }
    public function tambah(Request $request){
        $validasi= $request->validate([
            'Keterangan' => 'required|max:300',
            'nominal' =>'required|maxdigits:11',
            'tahunanggaran' =>'required|maxdigits:4',
            'sumberdana'=>'required|max:50',
        ]);
        Pendapatan::create($validasi);
        return back()->with('berhasil','Data berhasil di tambahkan!');
    }
}
