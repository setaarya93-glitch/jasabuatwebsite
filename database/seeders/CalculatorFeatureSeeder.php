<?php

namespace Database\Seeders;

use App\Models\CalculatorFeature;
use Illuminate\Database\Seeder;

class CalculatorFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fitur Website (Content Features)
        $contentFeatures = [
            [
                'name' => 'Domain Custom (.com/.id)',
                'slug' => 'domain-custom',
                'description' => 'Domain profesional untuk bisnis Anda',
                'price' => 150000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Hosting Premium (1 Tahun)',
                'slug' => 'hosting-premium',
                'description' => 'Hosting cepat dengan SSL gratis',
                'price' => 350000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Halaman Tambahan (5 halaman)',
                'slug' => 'halaman-tambahan',
                'description' => 'Tentang, Layanan, Galeri, dll',
                'price' => 200000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Galeri Produk/Menu',
                'slug' => 'galeri-produk',
                'description' => 'Tampilkan produk dengan kategori',
                'price' => 100000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Blog/Artikel',
                'slug' => 'blog-artikel',
                'description' => 'Kelola konten dengan mudah',
                'price' => 150000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Form Kontak & Maps',
                'slug' => 'form-kontak',
                'description' => 'Form integrasi WhatsApp + Google Maps',
                'price' => 80000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Integrasi Sosial Media',
                'slug' => 'integrasi-sosial-media',
                'description' => 'Link Instagram, TikTok, Facebook',
                'price' => 50000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'WhatsApp Chat Widget',
                'slug' => 'whatsapp-widget',
                'description' => 'Tombol chat WA mengambang',
                'price' => 75000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'SEO Dasar',
                'slug' => 'seo-dasar',
                'description' => 'Optimasi Google Search & meta tags',
                'price' => 100000,
                'category' => 'feature',
                'is_recommended' => false,
                'sort_order' => 9,
                'is_active' => true,
            ],
        ];

        // Layanan Dukungan (Support Services)
        $supportServices = [
            [
                'name' => 'Revisi 3x',
                'slug' => 'revisi-3x',
                'description' => 'Termasuk gratis',
                'price' => 0,
                'category' => 'service',
                'is_recommended' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Maintenance Bulanan',
                'slug' => 'maintenance',
                'description' => 'Update & backup rutin per bulan',
                'price' => 150000,
                'category' => 'service',
                'is_recommended' => false,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Support Prioritas',
                'slug' => 'support-prioritas',
                'description' => 'Respon cepat via WhatsApp',
                'price' => 100000,
                'category' => 'service',
                'is_recommended' => false,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Video Tutorial Admin',
                'slug' => 'video-tutorial',
                'description' => 'Panduan mengelola website',
                'price' => 75000,
                'category' => 'service',
                'is_recommended' => false,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Google Analytics Setup',
                'slug' => 'google-analytics',
                'description' => 'Tracking pengunjung website',
                'price' => 100000,
                'category' => 'service',
                'is_recommended' => false,
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        // Insert data
        foreach (array_merge($contentFeatures, $supportServices) as $feature) {
            CalculatorFeature::create($feature);
        }
    }
}
