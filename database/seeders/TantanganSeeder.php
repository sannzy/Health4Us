<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tantangan;

class TantanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tantangan::create([
            'judul' => 'December Fun Run 2026',
            'slug' => 'december-fun-run',
            'kategori' => 'Lari',
            'deskripsi' => 'Acara lari santai yang terbuka untuk semua kalangan.',
            'gambar' => '/asset/lari.jpeg',
            'jarak' =>  '5 km',
            'hadiah' =>  'Medali',
            'tanggal'  => '2025-12-30',
            'koin' => '300'
        ]);

        Tantangan::create([
            'judul' => 'Sunset Run 2026',
            'slug' => 'sunset-run',
            'kategori' => 'Lari',
            'deskripsi' => 'Event lari sore dengan pemandangan sunset.',
            'gambar' => '/asset/sunriserun.jpg',
            'jarak' => '12.5 km',
            'hadiah' => 'Medali',
            'tanggal'  => '2026-01-30',
            'koin' => '375'
        ]);
        
        Tantangan::create([
            'judul' => 'Morning Jog Challenge',
            'slug' => 'morning-jog',
            'kategori' => 'Lari',
            'deskripsi' => 'Lari pagi sehat dan menyenangkan.',
            'gambar' => '/asset/aquasprint.jpeg',
            'jarak' => '8.5 km',
            'hadiah' => 'Medali dan sertifikat',
            'tanggal'  => '2026-01-31',
            'koin' => '255'
        ]);

        Tantangan::create([
            'judul' => 'December Bike Ride 2026',
            'slug' => 'december-bike-ride',
            'kategori' => 'Bersepeda',
            'deskripsi' => 'Event sepeda akhir tahun untuk semua peserta.',
            'gambar' => '/asset/Sepeda.jpeg',
            'jarak' => '4.5 km',
            'hadiah' => 'Medali dan uang tunai',
            'tanggal'  => '2026-01-26',
            'koin' => '90'
        ]);

        Tantangan::create([
            'judul' => 'Mountain Cycling Challenge',
            'slug' => 'mountain-cycling',
            'kategori' => 'Bersepeda',
            'deskripsi' => 'Tantangan sepeda gunung.',
            'gambar' => '/asset/sepeda1.jpeg',
            'jarak' => '10 km',
            'hadiah' => 'Medali dan sertifikat',
            'tanggal'  => '2026-01-28',
            'koin' => '400'
        ]);

        Tantangan::create([
            'judul' => 'City Ride Marathon',
            'slug' => 'city-ride',
            'kategori' => 'Bersepeda',
            'deskripsi' => 'Gowes fun di dalam kota.',
            'gambar' => '/asset/sepeda3.jpg',
            'jarak' => '20.8 km',
            'hadiah' => 'Medali dan sertifikat',
            'tanggal'  => '2026-01-29',
            'koin' => '640'
        ]);

        Tantangan::create([
            'judul' => 'December Swim Fest 2026',
            'slug' => 'swim-fest',
            'kategori' => 'Renang',
            'deskripsi' => 'Event renang santai keluarga.',
            'gambar' => '/asset/renang1.jpeg',
            'jarak' => '500 m',
            'hadiah' => 'Medali',
            'tanggal'  => '2026-01-27',
            'koin' => '150'
        ]);

        Tantangan::create([
            'judul' => 'Aqua Challenge',
            'slug' => 'aqua-challenge',
            'kategori' => 'Renang',
            'deskripsi' => 'Lomba renang menyenangkan.',
            'gambar' => '/asset/renang2.jpeg',
            'jarak' => '400 m',
            'hadiah' => 'Medali',
            'tanggal'  => '2026-01-28',
            'koin' => '125'
        ]);

        Tantangan::create([
            'judul' => 'Blue Water Splash',
            'slug' => 'blue-water',
            'kategori' => 'Renang',
            'deskripsi' => 'Event renang rekreasi.',
            'gambar' => '/asset/renang3.jpeg',
            'jarak' => '350 m',
            'hadiah' => 'Medali dan uang tunai',
            'tanggal'  => '2026-01-29',
            'koin' => '100'
        ]);
    }
}