<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        // Validasi input
        $attributes = request()->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);

        // Ambil data pegawai berdasarkan nama
        $pegawai = \App\Models\Pegawai::where('nama', $attributes['nama'])->first();

        // Periksa apakah data pegawai ditemukan
        if (!$pegawai) {
            return back()->withErrors(['nama' => 'Nama tidak ditemukan.']);
        }

        // Login user menggunakan Auth
        Auth::login($pegawai);

        // Regenerasi session untuk keamanan
        session()->regenerate();

        return redirect('dashboard')->with('success', 'Selamat datang, ' . $pegawai->nama . '!');
    }


    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
    }
}
