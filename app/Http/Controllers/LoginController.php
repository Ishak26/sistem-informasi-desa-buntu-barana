<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use illuminate\support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    //
    public function create(request $request)
    {
        $validate = $request->validate([
            "username" => 'required',
            "email" => 'required|Email:dns',
            "bidang"=>'required|String ',
            "password" => 'required|min:5',
            "konfirmasi" => 'required|min:5',
        ]);

        if ($request->password == $request->konfirmasi) {
            $pass = Hash::make($request->password);
            $validate['password'] = $pass;
            Login::create($validate);
            return redirect('/dashboard')->with('sukses','account berhasil di daftar!!');
        } else {
            return back()->with('errorkonfirmasi', 'Konfirmasi Salah!!');
        }
    }
    public function updateData(Request $request){
        $objek=Login::where('id',$request->id)->first();
        if($objek->nik == $request->nik){
            $rules = $request->validate([
                'profil'=>'file|mimes:jpg,png,jpeg',
                'hp' => 'required|numeric',
                'alamat' => 'required|String',
                'tanggallahir' => 'required',
                'jeniskelamin' => 'required|max:30'
            ]);
        }else{
             $rules = $request->validate([
                 'profil'=>'file|mimes:jpg,png,jpeg',
                 'nik' => 'required|unique:Logins',
                 'hp' => 'required|numeric',
                 'alamat' => 'required|String',
                 'tanggallahir' => 'required',
                 'jeniskelamin' => 'required|max:30'
             ]);
            
         }
        if($request->file('profil')){
            $rules['profil'] = $request->file('profil')->store('file-user-profil');
        }
       
        $objek->update($rules);
        return back()->with('perubahan', 'Update Berhasil!!');

    }

    public function authenticate(Request $request)
    {
        // $request['password'] = bcrypt($request['password']);
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email' => 'Email tidak sesuai!!',
            'password'=>'Password Salah!'
        ]);
    }
    public function logout(Request $request)
    {
    $request->session()->flush();
    $request->session()->invalidate();
    return redirect('/');
    }
}
