<?php

namespace App\Http\Controllers;

use App\Models\Program_Kerja;
use App\Models\Pendapatan;

class KeuanganController extends Controller
{
    public function index(){
        $pendapatan= Pendapatan::all();
        $pkPemerintahan=Program_Kerja::where('bidang','=','KASI PEMERINTAHAN')->get();
        $pkkesra=Program_Kerja::where('bidang','=','KASI KESEJAHTERAAN MASYARAKAT')->get();
        $pkkemasyarakatan=Program_Kerja::where('bidang','=','KASI KEMASYARAKATAN')->get();
        return view('keuangandesa',[
            'title'=> 'DESA BUNTU BARANA | KEUANGAN',
            'pendapatan'=>$pendapatan,
            'pkpemerintahan'=>$pkPemerintahan,
            'pkkesra'=>$pkkesra,
            'pkkemasyarakatan'=>$pkkemasyarakatan,
        ]);
    }
}
