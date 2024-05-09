<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Kategori::create(
            [
                'id' => 1,
                'nama_kategori' => 'Alat Olahraga',
            ]
        );
        Kategori::create(
            [
                'id' => 2,
                'nama_kategori' => 'Alat Musik',
            ]
        );
    }
}
