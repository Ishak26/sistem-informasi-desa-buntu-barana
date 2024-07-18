<?php

namespace App\Http\Controllers;
use App\Models\Program_Kerja;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse; 
class ProgramKerjaController extends Controller
{
    public function index(){
        $data = Program_Kerja::all();
        if(Gate::any(['sekertaris','kepaladesa'])){
          $datas =$data;
        }else{
          $datas =$data->where('bidang',auth()->user()->bidang);
        }
        return view('Dashboard.pemerintahan.program_kerja',[
          'data'=>$datas
        ]);
    }
    public function tambah(Request $request){
      $validasi=$request->validate(
        [
            'proker' => 'required|max:400',
            'bidang' =>'required|String',
            'anggaran'=>'required|numeric|max_digits:15',
            'terbilang'=>'required|max:200',
            'Sumber_dana'=>'required',
            'Tanggal_Pengerjaan'=>'required|date',
            'proposal'=>'required|file|mimes:pdf'
        ]
      ); 
      if ($request->file('proposal')) {
        $validasi['proposal'] = $request->file('proposal')->store('file-proposal-proker');
      }
      Program_Kerja::create($validasi);
      return back()->with('status', 'Data berhasil di tambahkan!');
    }
    public function verifikasi(Program_Kerja $Program_Kerja,Request $request)
    {
      if (!Gate::any(['sekertaris','kepaladesa'])) {
        abort(403);
    }
      $validate =$request->validate([
        'Verifikasi_sekertaris'=> 'boolean',
        'Verifikasi_KepalaDesa'=> 'boolean',
      ]);
      Program_Kerja::where('id',$Program_Kerja->id)->update($validate);
      return back()->with('verifikasi','Telah Diverifikasi');
    }
}
