<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritas = [
            [
                'path' => '/assets/banner/berita1.jpg',
                'judul' => 'Update Terbaru Game Mobile Legends',
                'deskripsi' => 'Mobile Legends telah merilis update terbaru dengan hero baru dan fitur yang menarik. Update ini membawa perubahan besar pada gameplay dan balance hero.',
                'tipe' => 'banner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path' => '/assets/banner/berita2.jpg',
                'judul' => 'Tips dan Trik Bermain PUBG Mobile',
                'deskripsi' => 'Pelajari strategi dan teknik bermain PUBG Mobile yang efektif. Dapatkan tips untuk meningkatkan skill bermain dan memenangkan pertandingan.',
                'tipe' => 'banner',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'path' => '/assets/banner/berita3.jpg',
                'judul' => 'Event Spesial Free Fire',
                'deskripsi' => 'Jangan lewatkan event spesial Free Fire yang memberikan hadiah menarik. Event ini hanya berlangsung dalam waktu terbatas.',
                'tipe' => 'banner',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'path' => '/assets/banner/berita4.jpg',
                'judul' => 'Review Game Genshin Impact',
                'deskripsi' => 'Genshin Impact adalah game open-world yang menawarkan pengalaman bermain yang luar biasa. Baca review lengkap game ini.',
                'tipe' => 'banner',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'path' => '/assets/banner/berita5.jpg',
                'judul' => 'Tournament E-Sports Nasional',
                'deskripsi' => 'Tournament e-sports nasional akan segera digelar dengan hadiah total puluhan juta rupiah. Daftar sekarang dan tunjukkan skill Anda.',
                'tipe' => 'banner',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(4),
            ],
            [
                'path' => '/assets/banner/berita6.jpg',
                'judul' => 'Perkembangan Game Indonesia',
                'deskripsi' => 'Industri game Indonesia terus berkembang dengan pesat. Banyak developer lokal yang menghasilkan game berkualitas internasional.',
                'tipe' => 'banner',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::create($berita);
        }
    }
}
