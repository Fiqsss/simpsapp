<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // OLAHRAGA
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Raket',
                'harga_beli' => 75000,
                'harga_jual' => 75000 * 1.3,
                'stok' => 10,
                'image_path' => 'raket.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Jersey Bola',
                'harga_beli' => 200000,
                'harga_jual' => 200000 * 1.3,
                'stok' => 5,
                'image_path' => 'jersey.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Sepatu Bola',
                'harga_beli' => 300000,
                'harga_jual' => 300000 * 1.3,
                'stok' => 50,
                'image_path' => 'spatubola.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Bola Basket',
                'harga_beli' => 78000,
                'harga_jual' => 78000 * 1.3,
                'stok' => 40,
                'image_path' => 'bolabasket.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Spatu Lari',
                'harga_beli' => 200000,
                'harga_jual' => 200000 * 1.3,
                'stok' => 20,
                'image_path' => 'spaturunning.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Tas Olahraga',
                'harga_beli' => 230000,
                'harga_jual' => 230000 * 1.3,
                'stok' => 15,
                'image_path' => 'sportbag.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 1,
                'nama_produk' => 'Smart Watch',
                'harga_beli' => 460000,
                'harga_jual' => 460000 * 1.3,
                'stok' => 23,
                'image_path' => 'smartwatch.jpg',
            ]
        );





        // ALAT MUSIK
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Gitar Listrik',
                'harga_beli' => 1000000,
                'harga_jual' => 1000000 * 1.3,
                'stok' => 5,
                'image_path' => 'gitarlistrik.png',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Piano Elektrik',
                'harga_beli' => 3000000,
                'harga_jual' => 3000000 * 1.3,
                'stok' => 3,
                'image_path' => 'piano.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Drum Snere',
                'harga_beli' => 2000000,
                'harga_jual' => 2000000 * 1.3,
                'stok' => 5,
                'image_path' => 'sneredrum.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Gitar Bas',
                'harga_beli' => 1500000,
                'harga_jual' => 1500000 * 1.3,
                'stok' => 9,
                'image_path' => 'bas.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Soundbar',
                'harga_beli' => 500000,
                'harga_jual' => 500000 * 1.3,
                'stok' => 80,
                'image_path' => 'soundbar.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Biola',
                'harga_beli' => 1500000,
                'harga_jual' => 1500000 * 1.3,
                'stok' => 10,
                'image_path' => 'biola.jpg',
            ]
        );
        Produk::create(
            [
                'kategori_produk_id' => 2,
                'nama_produk' => 'Head Phone',
                'harga_beli' => 960000,
                'harga_jual' => 960000 * 1.3,
                'stok' => 20,
                'image_path' => 'headphone.jpg',
            ]
        );
    }
};
