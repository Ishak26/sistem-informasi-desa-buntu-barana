<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\berita;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
class BeritaController extends Controller
{
     use AuthorizesRequests;
    public function index(){
        $berita = berita::latest();
        if (request('filter')) {
            $berita->where('judul', 'LIKE', '%' . request('filter') . '%');
        }
        return view('berita', [
            "title" => 'Desa Buntu Barana | Berita',
            "berita" => $berita->paginate(9)
        ]);
    }

    public function show(berita $berita)
    {
        $beritas =berita::all()->skip($berita->id);
        return view('baca',[
            "title" => 'Desa Buntu Barana | Berita',
            "baca" => $berita,
            "berita"=> $beritas
        ]);
    }
    public function create(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required|max:255',
            'category_id' => 'required',
            'slug' => 'required|unique:beritas|min:4|max:500',
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
        if(!gate::any(['sekertaris','kasikemasyarakatan'])){
            abort(404);
        };
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
        return view('Dashboard.Formberita',[
            'kategori'=>Category::all()
        ]);
    }


    public function destroy(berita $berita)
    {
        berita::destroy($berita->id);
        return redirect('databerita')->with('hapus', 'DataBerhasil di hapus!!');
    }

    public function edit(berita $berita)
    {
        $kategori=Category::all();
        return view('Dashboard.updatedataberita', [
            "edit" => $berita,
            "kategori"=>$kategori
        ]);
    }

    public function update(request $request, berita $berita)
    {
        ($request->slug == $berita->slug) ?
            $validateData = $request->validate([
                'judul' => 'required|max:255',
                'category_id' =>'required',
                'gambar' => 'image|file',
                'deskripsi' => 'required',
                'time' => 'required|date'
            ]):
            $validateData = $request->validate([
                'judul' => 'required|max:255',
                'category_id' => 'required',
                'slug' => 'required|unique:beritas|min:4|max:20',
                'gambar' => 'image|file',
                'deskripsi' => 'required',
                'time' => 'required'
            ]);
        if ($request->file('gambar')) {
            $validateData['gambar'] = $request->file('gambar')->store('img-berita');
        }
        berita::where('id', $berita->id)->update($validateData);
        return redirect('databerita')->with('edit', 'Data Berhasil di Update');
    }
}
