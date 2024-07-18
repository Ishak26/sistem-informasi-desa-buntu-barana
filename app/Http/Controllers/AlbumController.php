<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\berita;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        $album = Album::all();
        return view('dokumentasi', [
            "title" => 'Desa Buntu Barana | dokumentasi',
            "Albums" =>Album::with('Komentar')->get()
        ]);
    }
    public function view()
    {

        return view('Dashboard.tambahalbum', [
            'album' => Album::all()
        ]);
    }
    public function tambahfoto(Request $request)
    {
        $validasi = $request->validate([
            'gambar' => 'required|file|image'
        ]);
        if ($request->file('gambar')) {
            $validasi['gambar'] = $request->file('gambar')->store('img-album');

            Album::create($validasi);
            return redirect('/dashboard/tambahalbum')->with('sukses', 'Data Berhasil di Tambahkan!!');
        }
    }

    public function komentar(Request $request)
    {
        $validasi = $request->validate([
            'id_gambar' => 'required',
            'komentar' => 'required|max:100'
        ]);
        Komentar::create($validasi);
        return redirect('/dokumentasi');
    }
}
