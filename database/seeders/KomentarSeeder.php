<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Komentar;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Komentar::create([
            'laporan_id' => 1,
            'user_id' => 1,
            'komentar' => 'Laporan sedang diperiksa admin.',
        ]);

        Komentar::create([
            'laporan_id' => 2,
            'user_id' => 1,
            'komentar' => 'WiFi sedang dalam proses perbaikan.',
        ]);
    }
}