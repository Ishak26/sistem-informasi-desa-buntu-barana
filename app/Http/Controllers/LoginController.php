<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function create(request $request)
    {
        $validate = $request->validate([
            "username" => 'required',
            "email" => 'required|Email:dns',
            "password" => 'required|min:5',
            "konfirmasi" => 'required|min:5',
        ]);

        if ($request->password == $request->konfirmasi) {
            $pass = Hash::make($request->password);
            $validate['password'] = $pass;
            Login::create($validate);
            return redirect('/login');
        } else {
            return back()->with('errorkonfirmasi', 'Konfirmasi Salah!!');
        }
    }


    public function authenticate(Request $request)
    {
        // $request['password'] = bcrypt($request['password']);
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }
    public function logout(Request $request)
    {
     $request->session()->invalidate();

        return redirect('/');
    }
}
