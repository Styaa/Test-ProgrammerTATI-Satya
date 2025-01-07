<?php

namespace App\Http\Controllers;

use App\Models\LogHarian;
use Illuminate\Http\Request;

class LogHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function reviewLogs()
    {
        $atasanId = auth()->user()->id;

        $logs = LogHarian::where('status', 'pending')
            ->whereHas('pegawai', function ($query) use ($atasanId) {
                $query->where('atasan_id', $atasanId);
            })->get();

        return view('review-logs', compact('logs'));
    }

    public function approveLog($id)
    {
        $log = LogHarian::findOrFail($id);

        $log->status = 'Disetujui';
        $log->verifikator_id = auth()->user()->id;
        $log->tanggal_verifikasi = now()->format('Y-m-d');
        $log->save();

        return redirect()->back()->with('success', 'Log harian disetujui.');
    }

    public function rejectLog($id)
    {
        $log = LogHarian::findOrFail($id);

        $log->status = 'Ditolak';
        $log->verifikator_id = auth()->user()->id;
        $log->tanggal_verifikasi = now()->format('Y-m-d');
        $log->save();

        return redirect()->back()->with('success', 'Log harian ditolak.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->atasan_id === null) {
            return redirect()->back()->withErrors(['message' => 'Anda tidak dapat menambahkan kegiatan sebelum memiliki atasan.']);
        }

        $validated = $request->validate([
            'kegiatan' => ['required'],
        ]);

        $pegawaiId = auth()->user()->id;

        LogHarian::create([
            'tanggal' => now()->format('Y-m-d'),
            'kegiatan' => $validated['kegiatan'],
            'pegawai_id' => $pegawaiId,
        ]);

        session()->flash('success', 'Log harian berhasil ditambahkan.');

        return redirect()->route('dashboard');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
