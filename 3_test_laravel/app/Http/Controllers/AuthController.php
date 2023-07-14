<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        $title = 'Halaman Login';
        $page = "login";
        return view('auth.login', compact('title', 'page'));
    }

    public function login(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lakukan proses autentikasi
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil
            return redirect()->route('pages.home')->with('success', 'Login berhasil.');
        } else {
            // Jika autentikasi gagal
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}