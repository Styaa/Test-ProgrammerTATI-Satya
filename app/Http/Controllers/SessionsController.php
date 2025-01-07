<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);

        $pegawai = Pegawai::where('nama', $attributes['nama'])->first();

        if ($pegawai && Hash::check($attributes['password'], $pegawai->password)) {
            if (Auth::attempt($attributes)) {
                session()->regenerate();
                return redirect('dashboard')->with(['success' => 'You are logged in.']);
            }
        } else {
            return back()->withErrors(['nama' => 'Nama tidak ditemukan.']);
        }
    }


    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success' => 'You\'ve been logged out.']);
    }
}
