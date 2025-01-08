<?php

namespace App\Http\Controllers;

use App\Models\LogHarian;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // dd(auth()->id);
        $userId = auth()->user()->id; // Ambil ID user yang login

        // Ambil pegawai yang memiliki atasan sesuai user yang login
        $pegawaiIds = Pegawai::where('atasan_id', $userId)->pluck('id');

        // Hitung jumlah log harian pending milik pegawai
        $menungguVerifikasi = LogHarian::whereIn('pegawai_id', $pegawaiIds)
            ->where('status', 'Pending')
            ->count();

        $logHarians = LogHarian::select(
            'tanggal',
            'kegiatan',
            'status',
            'verifikator_id'
        )->where('pegawai_id', $userId)
            ->with(['pegawai:id,nama'])
            ->get();

        // dd(auth()->user()->jabatan->nama);

        $logsCount = [
            'pending' => LogHarian::where('pegawai_id', $userId)->where('status', 'pending')->count(),
            'approved' => LogHarian::where('pegawai_id', $userId)->where('status', 'disetujui')->count(),
            'rejected' => LogHarian::where('pegawai_id', $userId)->where('status', 'ditolak')->count(),
        ];

        // dd($logsCount);
        return view('dashboard', compact('logHarians', 'logsCount', 'menungguVerifikasi'));
    }
}
