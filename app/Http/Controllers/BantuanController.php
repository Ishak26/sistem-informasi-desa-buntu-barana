<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\penerimaBantuan;
use App\Models\Penduduk;
use illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class BantuanController extends Controller
{
    public function index(){
        $bantuan =Bantuan::latest()->get();
        
        return view('Dashboard.bantuan.databantuan',[
            'bantuan'=>$bantuan
        ]);
    }
    public function tambah(Request $request){
        if(!Gate::any(['kemasyarakatan','sekertaris'])){
            return abort(404);
        }
        $validasi= $request->validate([
            'bantuan'=>'required|max:50|string',
            'jenis'=>'required|max:50|string',
            'sumber'=>'required|max:50|string',
        ]);
        Bantuan::create($validasi);
        return back()->with('sukses','data berhasil ditambahkan!!');
    }
    public function penerima(Bantuan $bantuan){
        $penerima = $bantuan->penerimabantuan;
        return view('Dashboard.bantuan.datapenerima',[
            'penerima' =>$penerima,
            'bantuan'=>$bantuan
        ]);
    }

    public function filter(Request $request ,Penduduk $penduduk){
       $penduduks = $penduduk->all();
        $filter = function () use($request,$penduduks){
            if(($request->pendidikan)??false){
                $penduduks = $penduduks->whereIn('pendidikan',$request->pendidikan);
            }
            if(($request->status)??false){
                $penduduks = $penduduks->whereIn('status',$request->status);   
            }
            if(($request->jk)??false){
                $penduduks = $penduduks->whereIn('jk',$request->jk);
            }
            if(($request->pekerjaan)??false){
                $penduduks = $penduduks->whereIn('pekerjaan',$request->pekerjaan);
            }
            if(($request->pekerjaan)??false){

                $penduduks = $penduduks->where('penghasilan','<=',$request->pekerjaan);
            }
             return $penduduks;

        };
        foreach($filter() as $filter){
            penerimaBantuan::create([
                'bantuan_id'=>$request->bantuan_id,
                'penduduk_id'=>$filter->id,
            ]);
        }
        return back()->with('sukses','data berhasil di  tambahkan!');
    }

    public function penerimaBantuan(Request $request){
        $validasi = $request->validate([
            'bantuan_id' => 'required|numeric',
            'penduduk_id' => 'required|numeric',
        ]);
        $cekData = penerimabantuan::where('bantuan_id',$request->bantuan_id)->where('penduduk_id',$request->penduduk_id)->exists();
        if($cekData === true){
            return back()->with('edit','Penduduk telah terdaftar silahkan cek kembali data yang ada');
        }else{
            penerimaBantuan::create($validasi);
            return back()->with('sukses','Penerima berhasil di tambahkan!!');
        }
        
    }

    public function updatePenerimabantuan(penerimaBantuan $penerimaBantuan,Request $request){
        $validasi = $request->validate([
            'status' => 'numeric|boolean',
            'buktiterima'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if(isset($validasi['buktiterima'])){
            $validasi['buktiterima'] = $request->file('buktiterima')->store('img-terima-bantuan');
        }

        $penerimaBantuan->update($validasi);
        return back()->with('sukses','Data penerima berhasil di perbaharui!!');
    }

}
