<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jabatans = [
            ['nama' => 'Kepala Dinas', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kepala Bidang', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Staff', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('jabatans')->insert($jabatans);
    }
}
