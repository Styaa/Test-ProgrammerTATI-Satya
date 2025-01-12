<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\PerformaPegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pegawais = Pegawai::all();
        return view('employee.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $performas = PerformaPegawai::with('pegawai')
            ->where('pegawai_id', $id ?? null)
            ->get();

        // dd($performas);

        return view('employee.show', compact('performas', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    }

    public function penilaian($id)
    {
        return view('employee.penilaian', compact('id'));
    }

    public function storePredikat(Request $request, $id)
    {
        //
        $request->validate([
            'hasil_kerja' => 'required',
            'perilaku' => 'required',
        ]);

        $predikat_kinerja = $this->predikatKinerja($request->hasil_kerja, $request->perilaku);
        // dd($predikat_kinerja);
        PerformaPegawai::create([
            'pegawai_id' => $id,
            'hasil_kerja' => $request->hasil_kerja,
            'perilaku' => $request->perilaku,
            'predikat_kinerja' => $predikat_kinerja,
        ]);

        return redirect()->route('employee.show', $id)->with('success', 'Predikat kinerja berhasil disimpan.');
    }

    private function predikatKinerja($hasil_kerja, $perilaku)
    {
        $lookup = [
            'di bawah ekspektasi' => [
                'di bawah ekspektasi' => 'Sangat Kurang',
                'sesuai ekspektasi' => 'Butuh perbaikan',
                'di atas ekspektasi' => 'Butuh perbaikan',
            ],
            'sesuai ekspektasi' => [
                'di bawah ekspektasi' => 'Kurang/misconduct',
                'sesuai ekspektasi' => 'Baik',
                'di atas ekspektasi' => 'Baik',
            ],
            'di atas ekspektasi' => [
                'di bawah ekspektasi' => 'Kurang/misconduct',
                'sesuai ekspektasi' => 'Baik',
                'di atas ekspektasi' => 'Sangat Baik',
            ],
        ];

        return $lookup[$hasil_kerja][$perilaku] ?? 'Unknown';
    }
}
