<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf; 
use App\Models\Penduduk ;
use App\Models\Surat;
class SuratController extends Controller
{
    public function surat(Request $request,Penduduk $penduduk,Surat $nosurat){
        $mpdf = new mpdf(['format' => 'Legal']);
        $nikvalidasi=$penduduk->where('nik',intval($request->nik))->get(); 
        if($nikvalidasi->isEmpty()){
            return redirect()->route('about')->with('error' ,'Nik Yang anda masukkan tidak sesuai!');
        }
        $id_warga = $nikvalidasi->first();  
        Surat::Create([
            'id_warga'=>$id_warga->id,
            'jenis_surat'=>$request->namasurat,
        ]);
        if($request->namasurat === 'Surat Pangantar SKCK'){
           $mpdf->WriteHTML(view('Dashboard.surat.skck',
            ['data'=>$nikvalidasi,
            'nosurat'=> $nosurat->latest()->first()
            
        ]));
        }elseif($request->namasurat === 'Surat Pangantar NPWP') {
        $mpdf->WriteHTML(view('Dashboard.surat.npwp'));
        }else{
            $mpdf->WriteHTML(view('Dashboard.surat.ktp'));  }
        $mpdf->Output();
        return redirect()->route('about');
}
}