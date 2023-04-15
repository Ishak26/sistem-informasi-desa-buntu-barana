<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MahasiswaController extends Controller
{
    public function index(){
        return view('Dashboard.mahasiswa',[
            'mahasiswa' =>Mahasiswa::all()
        ]);
    }

    public function create(request $request){
        $validasi = $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'alamat'=>'required'
        ]);
        Mahasiswa::create($validasi);
        return redirect('/dashboard/mahasiswa');
    }
    

}
