<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UmkmTrendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trends = [
            [
                'category' => 'Ritel & Perdagangan',
                'trend_name' => 'Jastip Lokal Spesialis & Barter Impor',
                'description' => 'Jasa titip barang premium atau spesifik dari luar negeri maupun lokal yang sulit didapatkan.',
                'growth_percentage' => '+45%',
                'website_need_score' => 'Sangat Tinggi',
                'score_value' => 95,
                'website_features' => 'Sistem Trust/Resi, Katalog Produk, Form Pre-Order'
            ],
            [
                'category' => 'Fashion Berkelanjutan',
                'trend_name' => 'Upcycled Fashion / Thrifting Premium',
                'description' => 'Bisnis pakaian daur ulang atau pakaian bekas berkualitas tinggi yang dicuci dan dikemas premium.',
                'growth_percentage' => '+60%',
                'website_need_score' => 'Sangat Tinggi',
                'score_value' => 90,
                'website_features' => 'Toko Online, Manajemen Stok, Keranjang Belanja'
            ],
            [
                'category' => 'Kuliner Praktis',
                'trend_name' => 'Katering Sehat & Frozen Food',
                'description' => 'Makanan sehat siap olah bagi keluarga sibuk dan MPASI anak dengan bahan organik.',
                'growth_percentage' => '+35%',
                'website_need_score' => 'Tinggi',
                'score_value' => 80,
                'website_features' => 'Pre-Order System, Integrasi WA, Menu Galeri'
            ],
            [
                'category' => 'Jasa Digital',
                'trend_name' => 'Pembuat Konten TikTok / UGC Creator',
                'description' => 'Freelancer atau agensi yang membuat User Generated Content untuk promosi brand.',
                'growth_percentage' => '+80%',
                'website_need_score' => 'Tinggi',
                'score_value' => 75,
                'website_features' => 'Video Portfolio, Pricelist Jasa, Link In Bio'
            ],
            [
                'category' => 'Layanan Keluarga',
                'trend_name' => 'Daycare Mini & Pet Hotel',
                'description' => 'Penitipan anak rumah tangga atau hewan peliharaan harian untuk kelas pekerja perkotaan.',
                'growth_percentage' => '+30%',
                'website_need_score' => 'Sedang',
                'score_value' => 60,
                'website_features' => 'Company Profile, Galeri Fasilitas, Whatsapp Booking'
            ]
        ];

        foreach ($trends as $t) {
            \App\Models\UmkmTrend::create($t);
        }
    }
}
