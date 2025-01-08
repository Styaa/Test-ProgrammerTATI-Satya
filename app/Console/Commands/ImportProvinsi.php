<?php

namespace App\Console\Commands;

use App\Models\Provinsi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportProvinsi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-provinsi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data dari https://wilayah.id/api/provinces.json';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $url = 'https://wilayah.id/api/provinces.json';
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data['data'] as $province) {
                Provinsi::updateOrCreate(
                    ['code' => $province['code']],
                    ['name' => $province['name']]
                );
            }

            $this->info('Data provinsi berhasil diimpor.');
        } else {
            $this->error('Gagal mengambil data dari API.');
        }
    }
}
