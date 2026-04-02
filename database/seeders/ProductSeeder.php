<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductFeature;
use App\Models\ProductFeatureItem;
use App\Models\ProductBenefit;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Hexavara ERP',
                'slug'        => 'hexavara-erp',
                'tagline'     => 'Sistem ERP terintegrasi untuk kendali bisnis menyeluruh',
                'description' => 'Hexavara ERP adalah solusi enterprise resource planning komprehensif yang mengintegrasikan seluruh proses bisnis — dari keuangan, inventory, HR, hingga operasional — dalam satu platform terpadu. Dirancang untuk memberikan visibilitas penuh atas seluruh sumber daya perusahaan, memungkinkan pengambilan keputusan yang cepat dan akurat.',
                'cover'       => null,
                'images'      => [],
                'features'    => [
                    [
                        'icon'  => 'account_balance_wallet',
                        'title' => 'Budget Planning & Allocation',
                        'items' => [
                            'Buat dan kelola anggaran per proyek atau departemen',
                            'Alokasikan dana ke berbagai kategori biaya',
                            'Sistem persetujuan anggaran multi-level',
                        ],
                    ],
                    [
                        'icon'  => 'monitoring',
                        'title' => 'Cost Tracking & Monitoring',
                        'items' => [
                            'Pelacakan pengeluaran secara real-time',
                            'Monitor biaya per proyek, divisi, atau aktivitas',
                            'Notifikasi otomatis saat anggaran hampir melampaui batas',
                        ],
                    ],
                    [
                        'icon'  => 'receipt_long',
                        'title' => 'Expense Management',
                        'items' => [
                            'Catat dan kategorikan pengeluaran dengan mudah',
                            'Upload dokumen pendukung langsung di sistem',
                            'Alur persetujuan expense yang terstruktur',
                        ],
                    ],
                    [
                        'icon'  => 'bar_chart',
                        'title' => 'Financial Reporting',
                        'items' => [
                            'Generate laporan harian, bulanan, dan tahunan',
                            'Overview Profit & Loss secara komprehensif',
                            'Dashboard interaktif dengan grafik dan insight',
                        ],
                    ],
                    [
                        'icon'  => 'analytics',
                        'title' => 'Cost Analysis',
                        'items' => [
                            'Perbandingan anggaran vs realisasi secara akurat',
                            'Identifikasi inefisiensi biaya di tiap lini',
                            'Financial insight berbasis data untuk keputusan strategis',
                        ],
                    ],
                    [
                        'icon'  => 'admin_panel_settings',
                        'title' => 'User & Role Management',
                        'items' => [
                            'Akses multi-user dengan kontrol keamanan penuh',
                            'Perizinan berbasis role yang fleksibel',
                            'Activity log dan audit trail lengkap',
                        ],
                    ],
                ],
                'benefits' => [
                    ['icon' => 'visibility',   'title' => 'Transparansi penuh atas data keuangan perusahaan'],
                    ['icon' => 'savings',       'title' => 'Kontrol anggaran lebih baik dan efisiensi biaya meningkat'],
                    ['icon' => 'speed',         'title' => 'Pengambilan keputusan lebih cepat dan akurat'],
                    ['icon' => 'trending_up',   'title' => 'Skalabel dan adaptif sesuai pertumbuhan bisnis'],
                ],
            ],
            [
                'name'        => 'HexaPOS',
                'slug'        => 'hexapos',
                'tagline'     => 'Point of Sale cerdas untuk retail & F&B',
                'description' => 'Sistem kasir modern dengan fitur lengkap untuk membantu bisnis retail dan F&B mengelola transaksi dengan mudah dan efisien.',
                'cover'       => null,
                'images'      => [],
                'features'    => [
                    [
                        'icon'  => 'point_of_sale',
                        'title' => 'Transaksi Cepat',
                        'items' => ['Checkout dalam hitungan detik', 'Multi payment method', 'Split bill support'],
                    ],
                    [
                        'icon'  => 'receipt_long',
                        'title' => 'Laporan Penjualan',
                        'items' => ['Laporan harian, mingguan, bulanan', 'Export ke Excel & PDF', 'Analisis produk terlaris'],
                    ],
                    [
                        'icon'  => 'inventory_2',
                        'title' => 'Manajemen Stok',
                        'items' => ['Stok real-time terupdate otomatis', 'Notifikasi stok menipis', 'Multi-kategori produk'],
                    ],
                ],
                'benefits' => [
                    ['icon' => 'bolt',         'title' => 'Proses transaksi 3x lebih cepat'],
                    ['icon' => 'cloud',        'title' => 'Sinkronisasi cloud otomatis setiap saat'],
                    ['icon' => 'devices',      'title' => 'Bisa diakses dari tablet & smartphone'],
                    ['icon' => 'bar_chart',    'title' => 'Laporan bisnis lengkap dalam genggaman'],
                ],
            ],
            [
                'name'        => 'HexaSite',
                'slug'        => 'hexasite',
                'tagline'     => 'Website builder profesional untuk UMKM',
                'description' => 'Platform pembuatan website profesional tanpa coding, dirancang khusus untuk kebutuhan UMKM Indonesia agar bisa tampil online dengan cepat dan mudah.',
                'cover'       => null,
                'images'      => [],
                'features'    => [
                    [
                        'icon'  => 'web',
                        'title' => 'Drag & Drop Builder',
                        'items' => ['100+ template profesional siap pakai', 'Responsive design otomatis', 'Custom domain support'],
                    ],
                    [
                        'icon'  => 'shopping_cart',
                        'title' => 'E-Commerce Ready',
                        'items' => ['Katalog produk tak terbatas', 'Integrasi payment gateway', 'Manajemen order terpusat'],
                    ],
                    [
                        'icon'  => 'search',
                        'title' => 'SEO & Marketing Tools',
                        'items' => ['Pengaturan SEO on-page otomatis', 'Integrasi Google Analytics', 'Fitur promo & diskon produk'],
                    ],
                ],
                'benefits' => [
                    ['icon' => 'rocket_launch',  'title' => 'Website live dalam 30 menit tanpa coding'],
                    ['icon' => 'search',         'title' => 'SEO-friendly out of the box'],
                    ['icon' => 'support_agent',  'title' => 'Support 24/7 dalam bahasa Indonesia'],
                    ['icon' => 'payments',       'title' => 'Terima pembayaran dari berbagai metode'],
                ],
            ],
        ];

        foreach ($products as $index => $data) {
            $product = Product::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name'        => $data['name'],
                    'tagline'     => $data['tagline'],
                    'description' => $data['description'],
                    'image_cover' => $data['cover'] ?? null,
                    'sort_order'  => $index,
                ]
            );

            // Sync gallery images
            if (!empty($data['images'])) {
                $product->images()->delete();
                foreach (($data['images'] ?? []) as $ii => $imagePath) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                        'sort_order' => $ii,
                    ]);
                }
            }

            // Sync features
            $product->features()->each(function ($feature) {
                $feature->items()->delete();
                $feature->delete();
            });
            foreach ($data['features'] as $fi => $featureData) {
                $feature = ProductFeature::create([
                    'product_id' => $product->id,
                    'icon'       => $featureData['icon'],
                    'title'      => $featureData['title'],
                    'sort_order' => $fi,
                ]);
                foreach ($featureData['items'] as $ii => $text) {
                    ProductFeatureItem::create([
                        'feature_id' => $feature->id,
                        'text'       => $text,
                        'sort_order' => $ii,
                    ]);
                }
            }

            // Sync benefits
            $product->benefits()->delete();
            foreach ($data['benefits'] as $bi => $benefitData) {
                ProductBenefit::create([
                    'product_id' => $product->id,
                    'icon'       => $benefitData['icon'],
                    'title'      => $benefitData['title'],
                    'sort_order' => $bi,
                ]);
            }
        }
    }
}
