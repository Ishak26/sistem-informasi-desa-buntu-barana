<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf; 
use App\Models\Penduduk ;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;
class SuratController extends Controller
{

    public function surat(){
        $dataSurat=Surat::all();
        return view('Dashboard.Pemerintahan.surat',[
            'dataSurat'=>$dataSurat
        ]);
    }
    public function pengajuan(Request $request){
        $validasi =$request->validate([
            'id_warga' => 'numeric',
            'jenis'=>'required|String',
            'keperluan'=>'required|String'
        ]);
        Surat::create($validasi);
        return redirect('/layanan/surat')->with('Surat berhasil di ajukan, Tunggu verifikasi sekertaris desa');
    }
    // public function buatSurat(Surat $surat){
    //     $mpdf = new mpdf(['format' => 'Legal']);
    //     if($surat->jenis === 'Surat Pangantar SKCK'){
    //        $mpdf->WriteHTML(view('Dashboard.surat.skck',
    //         ['data'=>$surat,
    //         'nosurat'=> Surat::latest()->first()
    //     ]));
    //     }
    //     elseif($surat->jenis === 'Surat Pangantar NPWP') {
    //     $mpdf->WriteHTML(view('Dashboard.surat.npwp',[
    //         'data'=>$surat,
    //         'nosurat'=> Surat::latest()->first()]));
    //     }
    //     else{
    //         $mpdf->WriteHTML(view('Dashboard.surat.ktp',[
    //             'data'=>$surat,
    //             'nosurat'=> Surat::latest()->first()]));  
    //     }
    //     Surat::where('id','like',$surat->id)->update([
    //         'verifikasi'=>true,
    //         'filesurat'=>$surat->penduduk->nama.'.pdf'
    //     ]);
    //     $mpdf->Output(storage_path('app/public/file-surat/' .$surat->penduduk->nama.'.pdf'),\Mpdf\Output\Destination::FILE);
    //     // $mpdf->Output();
    //     return redirect('/dashboard/surat')->with('verifikasiSurat','Surat Telah diverifikasi');
    // }

    public function buatSurat(Surat $surat){
        $mpdf = new mpdf(['format' => 'Legal']);
        // @dd($surat->jenis);
        switch ($surat->jenis) {
            case 'Surat Pengantar SKCK':
                $mpdf->WriteHTML(view('Dashboard.surat.skck',
                    ['data'=>$surat,
                    'nosurat'=> Surat::latest()->first()
                ]));
            break;
            case 'Surat Pengantar KTP':
                $mpdf->WriteHTML(view('Dashboard.surat.ktp',
                    ['data'=>$surat,
                    'nosurat'=> Surat::latest()->first()
                ]));
            break;
            case 'Surat Izin Usaha':
                $mpdf->WriteHTML(view('Dashboard.surat.izinusaha',
                    ['data'=>$surat,
                    'nosurat'=> Surat::latest()->first()
                ]));
            break;
            
            default:
                return back()->with('suratfail','Surat Tidak sesuai!!');
        }
        Surat::where('id','like',$surat->id)->update([
            'verifikasi'=>1,
            'filesurat'=>$surat->penduduk->nama.'.pdf'
        ]);
        $mpdf->Output(storage_path('app/public/file-surat/' .$surat->penduduk->nama.'.pdf'),\Mpdf\Output\Destination::FILE);
        // $mpdf->Output();
        return redirect('/dashboard/surat')->with('verifikasiSurat','Surat Telah diverifikasi');
    }
}
