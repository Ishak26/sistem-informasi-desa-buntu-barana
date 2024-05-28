<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class BeritaController extends Controller
{
     use AuthorizesRequests;
    public function index()
    {
        $berita = berita::latest();
        if (request('filter')) {
            $berita->where('judul', 'LIKE', '%' . request('filter') . '%');
        }
        return view('berita', [
            "title" => 'Desa XYZ | berita',
            "berita" => $berita->paginate(9)
        ]);
    }

    public function show(berita $berita)
    {
        return view('baca', [
            "title" => 'Baca',
            "baca" => $berita
        ]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required|max:255',
            'category_id' => 'required',
            'slug' => 'required|unique:beritas|min:4|max:20',
            'gambar' => 'image|file',
            'deskripsi' => 'required',
            'time' => 'required'
        ]);

        $validate['gambar'] = $request->file('gambar')->store('img-berita');
        berita::create($validate);
        return redirect('/databerita')->with('sukses', 'Data Berhasil di Tambahkan!!');
    }

    public function store()
    {   
        $this->authorize('sekertaris');
        $berita = berita::latest();
        if (request('filter')) {
            $berita->where('judul', 'LIKE', '%' . request('filter') . '%');
        }
        return view('Dashboard.databerita', [
            "data" => $berita->paginate(10)
        ]);
    }
    public function tambah()
    {
        return view('Dashboard.Formberita');
    }


    public function destroy(berita $berita)
    {
        berita::destroy($berita->id);
        return redirect('databerita')->with('hapus', 'DataBerhasil di hapus!!');
    }

    public function edit(berita $berita)
    {
        return view('Dashboard.updatedataberita', [
            "edit" => $berita
        ]);
    }

    public function update(request $request, berita $berita)
    {

        ($request->slug == $berita->slug) ?
            $validateData = $request->validate([
                'judul' => 'required|max:255',
                'category_id' => 'required',
                'gambar' => 'image|file',
                'deskripsi' => 'required',
                'time' => 'required|date'
            ]) :
            $validateData = $request->validate([
                'judul' => 'required|max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:beritas|min:4|max:20',
                'gambar' => 'image|file',
                'deskripsi' => 'required',
                'time' => 'required'
            ]);
        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('img-album');
        }
        berita::where('id', $berita->id)->update($validateData);

        return redirect()->action([BeritaController::class, 'store'])->with('edit', 'Data Berhasil di Update');
    }
}
