<?php
namespace App\Http\Controllers;

use App\Models\Kades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class KadesController extends Controller
{
    public function index(){
        return view('about',[
            'kades'=>Kades::first()
        ]);
    }
    public function edit(request $request, Kades $Kades)
    {
        $validasi = $request->validate([
            'nama' => 'required|max:20',
            'foto' => 'image|file',
            'visi' => 'required',
            'misi' => 'required'
        ]);
        if ($request->file('foto')) {
            $validasi['foto'] = $request->file('foto')->store('img-kades');
        }
        Kades::where('id', $Kades->id)->update($validasi);
        return redirect('/dashboard')->with('edit', 'Profil berhasil diubah');
    }
}
