<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pegawai = [
            ['nama' => 'Ahmad Hidayat', 'jabatan' => 'Kepala Dinas', 'atasan_id' => null],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Kepala Bidang', 'atasan_id' => 1],
            ['nama' => 'Citra Lestari', 'jabatan' => 'Kepala Bidang', 'atasan_id' => 1],
            ['nama' => 'Dian Pratama', 'jabatan' => 'Staff', 'atasan_id' => 2],
            ['nama' => 'Eka Saputra', 'jabatan' => 'Staff', 'atasan_id' => 3],
        ];

        foreach ($pegawai as $p) {
            Pegawai::create($p);
        }
    }
}
