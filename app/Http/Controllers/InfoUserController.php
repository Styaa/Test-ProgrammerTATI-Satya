<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class InfoUserController extends Controller
{
    //
    public function create()
    {
        $user = auth()->user();
        if ($user->jabatan_id == 3) {
            $atasans = Pegawai::where('jabatan_id', 2)->get();
        } elseif ($user->jabatan_id == 2) {
            $atasans = Pegawai::where('jabatan_id', 1)->get();
        } else {
            $atasans = collect();
        }
        return view('user-profile', compact('atasans'));
    }

    public function updateAtasan(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'atasan_id' => 'required|exists:pegawais,id',
        ]);

        // Perbarui data pegawai yang sedang login
        $pegawai = auth()->user();
        $pegawai->atasan_id = $validated['atasan_id'];
        $pegawai->save();

        return response()->json(['success' => true, 'message' => 'Atasan berhasil diperbarui.']);
    }
}
