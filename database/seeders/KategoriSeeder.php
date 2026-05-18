<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Elektronik',
        ]);

        Kategori::create([
            'nama_kategori' => 'Jaringan',
        ]);

        Kategori::create([
            'nama_kategori' => 'Furnitur',
        ]);

        Kategori::create([
            'nama_kategori' => 'Kebersihan',
        ]);

        Kategori::create([
            'nama_kategori' => 'Bangunan',
        ]);
    }
}