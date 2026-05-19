<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laporan::create([
            'user_id' => 2,
            'kategori_id' => 1,
            'judul' => 'AC Rusak',
            'lokasi' => 'Lab Komputer',
            'deskripsi' => 'AC tidak dingin',
            'foto' => 'ac_rusak.jpg',
            'status' => 'pending',
        ]);

        Laporan::create([
            'user_id' => 2,
            'kategori_id' => 2,
            'judul' => 'WiFi Bermasalah',
            'lokasi' => 'Ruang Dosen',
            'deskripsi' => 'WiFi tidak bisa connect',
            'foto' => 'wifi_rusak.jpg',
            'status' => 'diproses',
        ]);
    }
}