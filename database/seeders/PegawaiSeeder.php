<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pegawais')->insert([
            [
                'nama' => 'Ahmad Hidayat',
                'jabatan_id' => 1, // Kepala Dinas
                'password' => bcrypt('12345'),
                'atasan_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'jabatan_id' => 2, // Kepala Bidang
                'password' => bcrypt('12345'),
                'atasan_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra Lesitari',
                'jabatan_id' => 2, // Kepala Bidang
                'password' => bcrypt('12345'),
                'atasan_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dian Pratama',
                'jabatan_id' => 3, // Staff
                'password' => bcrypt('12345'),
                'atasan_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Eka Saputra',
                'jabatan_id' => 3, // Staff
                'password' => bcrypt('12345'),
                'atasan_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
