<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class ProvinsiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        alert('hdhd');
        $provinsis = Provinsi::all();
        // dd($provinsi);
        return view('provinsi.index', compact('provinsis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id); // Ambil data provinsi berdasarkan ID
        return view('provinsi.edit', compact('provinsi')); // Kirim data ke form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $province = Provinsi::find($id);

        if (!$province) {
            return response()->json(['message' => 'Provinsi tidak ditemukan'], 404);
        }

        $province->delete();

        return response()->json(['message' => 'Provinsi berhasil dihapus']);
    }
}
