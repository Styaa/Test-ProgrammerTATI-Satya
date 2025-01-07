<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'nama' => ['required'],
            'password' => ['required']
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        Pegawai::create($attributes);

        session()->flash('success', 'Berhasil mendaftar');

        return redirect('/login');
    }
}
