<?php

namespace App\Http\Controllers;

use App\Models\LogHarian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $logHarians = LogHarian::select(
            'tanggal',
            'kegiatan',
            'status',
            'verifikator_id'
        )->where('pegawai_id', auth()->user()->id)
            ->with(['pegawai:id,nama'])
            ->get();

        return view('dashboard', compact('logHarians'));
    }
}
