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
        $provinsis = Provinsi::all();
        // dd($provinsi);
        return view('provinsi.index', compact('provinsis'));
    }

    public function create()
    {
        // var_dump("HEHE");
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);

        Provinsi::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan.');
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
        $provinsi = Provinsi::findOrFail($id);

        $provinsi->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
        ]);

        return redirect()->route('provinsi.index')->with('success', 'Data provinsi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $province = Provinsi::find($id);

        if (!$province) {
            return redirect()->route('provinsi.index')->with('success', 'Provinsi tidak ditemukan.');
        }

        $province->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus.');
    }
}
