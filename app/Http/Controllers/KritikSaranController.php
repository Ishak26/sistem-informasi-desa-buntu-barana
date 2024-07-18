<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function tambah(Request $requase){
      $validasi = $requase->validate([
        'kritik' => 'required',
        'Saran' => 'required'
      ]);
      KritikSaran::create($validasi);
      return back()->with('pesanTerkirim','Kritik dan saran anda berhasil dikirim!!');
    }
}
