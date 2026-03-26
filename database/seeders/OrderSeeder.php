<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            [
                'name' => 'PT Maju Bersama',
                'email' => 'info@majubersama.co.id',
                'phone' => '081234567890',
                'company' => 'PT Maju Bersama',
                'project_description' => 'Kami membutuhkan aplikasi ERP untuk mengelola inventory, purchasing, dan sales di 3 cabang kami. Sistem harus bisa diakses secara online dan terintegrasi dengan sistem akuntansi yang sudah ada.',
                'categories' => ['software-development'],
                'budget' => 'Rp 150.000.000 - Rp 250.000.000',
                'status' => 'completed',
                'created_at' => now()->subDays(45),
            ],
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@gmail.com',
                'phone' => '085678901234',
                'company' => 'CV Teknologi Nusantara',
                'project_description' => 'Butuh website company profile yang modern dan responsive untuk perusahaan IT kami. Harus ada halaman portfolio, layanan, dan blog. Desain harus clean dan profesional.',
                'categories' => ['digital-branding', 'software-development'],
                'budget' => 'Rp 15.000.000 - Rp 30.000.000',
                'status' => 'in_progress',
                'created_at' => now()->subDays(20),
            ],
            [
                'name' => 'Siti Rahayu',
                'email' => 'siti.rahayu@dinaskominfo.go.id',
                'phone' => '087812345678',
                'company' => 'Dinas Kominfo Kab. Sidoarjo',
                'project_description' => 'Pengembangan aplikasi smart city untuk Dashboard monitoring data kependudukan, pelayanan publik, dan infrastruktur. Aplikasi harus mendukung visualisasi GIS dan real-time reporting.',
                'categories' => ['software-development', 'it-consultant'],
                'budget' => 'Rp 300.000.000 - Rp 500.000.000',
                'status' => 'pending',
                'created_at' => now()->subDays(5),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@tokofashion.id',
                'phone' => '089912345678',
                'company' => 'Toko Fashion Online',
                'project_description' => 'Kami ingin membuat e-commerce platform untuk menjual produk fashion secara online. Fitur yang dibutuhkan: product catalog, shopping cart, payment gateway, order tracking, dan admin panel.',
                'categories' => ['software-development'],
                'budget' => 'Rp 80.000.000 - Rp 120.000.000',
                'status' => 'pending',
                'created_at' => now()->subDays(3),
            ],
            [
                'name' => 'Diana Putri',
                'email' => 'diana.putri@startup.io',
                'phone' => '081345678912',
                'company' => 'StartupKu',
                'project_description' => 'Kami startup di bidang edtech dan membutuhkan konsultasi IT untuk merancang arsitektur system yang scalable. Saat ini user kami 5000 dan target 100K dalam 6 bulan.',
                'categories' => ['it-consultant', 'startup-incubator'],
                'budget' => 'Rp 50.000.000 - Rp 100.000.000',
                'status' => 'in_progress',
                'created_at' => now()->subDays(12),
            ],
            [
                'name' => 'Rizky Pratama',
                'email' => 'rizky@salonkecantikan.com',
                'phone' => '082156789012',
                'company' => 'Salon Kecantikan Ayu',
                'project_description' => 'Butuh rebranding digital lengkap: logo baru, sosial media kit, website, dan strategi digital marketing untuk menarik pelanggan baru.',
                'categories' => ['digital-branding'],
                'budget' => 'Rp 20.000.000 - Rp 40.000.000',
                'status' => 'completed',
                'created_at' => now()->subDays(60),
            ],
            [
                'name' => 'Hendra Wijaya',
                'email' => 'hendra.w@manufacturing.co.id',
                'phone' => '085567890123',
                'company' => 'PT Indo Manufaktur',
                'project_description' => 'Perlu aplikasi monitoring produksi pabrik yang terintegrasi dengan IoT sensor. Aplikasi harus bisa menampilkan data real-time dari mesin produksi dan generate laporan harian/bulanan.',
                'categories' => ['software-development', 'it-consultant'],
                'budget' => 'Rp 200.000.000 - Rp 350.000.000',
                'status' => 'pending',
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Maya Anggraini',
                'email' => 'maya@koperasisejahtera.org',
                'phone' => '083456789012',
                'company' => 'Koperasi Sejahtera Mandiri',
                'project_description' => 'Membutuhkan sistem informasi koperasi untuk mengelola simpan pinjam anggota, pembukuan, dan laporan keuangan bulanan. User sekitar 500 anggota.',
                'categories' => ['software-development'],
                'budget' => 'Rp 30.000.000 - Rp 60.000.000',
                'status' => 'rejected',
                'created_at' => now()->subDays(30),
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
