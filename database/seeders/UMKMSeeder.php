<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UMKM;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UMKM::create([
            'slug' => 'kopi-susu',
            'nama' => 'Tuku - Es Kopi Susu Tetangga',
            'kategori' => 'makanan_minuman',
            'healthkoin' => 750,
            'gambar' => '/asset/tuku.png',
            'label' => 'Terlaris',
        ]);

        UMKM::create([
            'slug' => 'mie-sehat',
            'nama' => 'Mie Sehat Cempaka',
            'kategori' => 'makanan_minuman',
            'healthkoin' => 250,
            'gambar' => '/asset/mie.png',
            'label' => 'Pilihan Sehat',
        ]);

        UMKM::create([
            'slug' => 'pisang-goreng',
            'nama' => 'Pisang Goreng Bu Nanik - 5 PCS',
            'kategori' => 'makanan_minuman',
            'healthkoin' => 700,
            'gambar' => '/asset/pisgor.png',
        ]);

        UMKM::create([
            'slug' => 'jaket-olahraga',
            'nama' => 'Whittaker - Jaket Olahraga, Fitness',
            'kategori' => 'produk_olahraga',
            'healthkoin' => 1000,
            'gambar' => '/asset/jaket.png',
            'label' => 'Baru',
        ]);

        UMKM::create([
            'slug' => 'sepatu-olahraga',
            'nama' => 'Ortuseight - Sepatu Futsal Hypersonic - 38',
            'kategori' => 'produk_olahraga',
            'healthkoin' => 1000,
            'gambar' => '/asset/sepatu.png',
        ]);

        UMKM::create([
            'slug' => 'matras-yoga',
            'nama' => 'Svarga - Matras Yoga Tosca',
            'kategori' => 'produk_olahraga',
            'healthkoin' => 950,
            'gambar' => '/asset/matras yoga.png',
        ]);

        UMKM::create([
            'slug' => 'blouse-batik',
            'nama' => 'Nayara - Blouse Batik Navy',
            'kategori' => 'pakaian',
            'healthkoin' => 1050,
            'gambar' => '/asset/blouse.png',
            'label' => 'Baru',
        ]);

        UMKM::create([
            'slug' => 'sweater-garis',
            'nama' => 'This Is April - Evora Sweater',
            'kategori' => 'pakaian',
            'healthkoin' => 1020,
            'gambar' => '/asset/sweater.png',
        ]);

        UMKM::create([
            'slug' => 'lara-skirt',
            'nama' => 'Thenblank - Lara Skirt',
            'kategori' => 'pakaian',
            'healthkoin' => 1000,
            'gambar' => '/asset/skirt.png',
        ]);
    }
}
