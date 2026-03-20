<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            // Education & Academia
            ['name' => 'University of Indonesia (UI)', 'logo' => 'univ_indonesia.png', 'category' => 'education'],
            ['name' => 'Airlangga University (UNAIR)', 'logo' => 'unair.png', 'category' => 'education'],
            ['name' => 'ITS - Sepuluh Nopember Institute of Technology', 'logo' => 'its.png', 'category' => 'education'],
            ['name' => 'UBAYA - University of Surabaya', 'logo' => 'ubaya.png', 'category' => 'education'],
            ['name' => 'ROUDLOTUL FALAH', 'logo' => 'roudlotul_falah.png', 'category' => 'education'],

            // Government & Public Sector
            ['name' => 'KOMINFO', 'logo' => 'kominfo.png', 'category' => 'government'],
            ['name' => 'BKD JATIM', 'logo' => 'bkd_jatim.png', 'category' => 'government'],
            ['name' => 'BANJARBARU', 'logo' => 'banjarbaru.png', 'category' => 'government'],
            ['name' => 'BENGKULU', 'logo' => 'kota_bengkulu.png', 'category' => 'government'],
            ['name' => 'LAMONGAN', 'logo' => 'lamongan.png', 'category' => 'government'],
            ['name' => 'PAMEKASAN', 'logo' => 'pamekasan.png', 'category' => 'government'],
            ['name' => 'DR SOETOMO HOSPITAL', 'logo' => 'rs_soetomo.png', 'category' => 'government'],

            // SOE & Energy
            ['name' => 'TELKOM INDONESIA', 'logo' => 'telkom.png', 'category' => 'soe'],
            ['name' => 'WIKA (Wijaya Karya)', 'logo' => 'wika.png', 'category' => 'soe'],
            ['name' => 'PJB (PLN Nusantara Power)', 'logo' => 'PJB_logo.png', 'category' => 'soe'],
            ['name' => 'BERAU COAL', 'logo' => 'berau_coal.png', 'category' => 'soe'],

            // Banking & Finance
            ['name' => 'SINARMAS', 'logo' => 'sinarmas.png', 'category' => 'finance'],
            ['name' => 'BANK BENGKULU', 'logo' => 'bank_bengkulu.svg', 'category' => 'finance'],
            ['name' => 'BMT MUDA', 'logo' => 'bmt_muda.png', 'category' => 'finance'],

            // Industrial, Manufacturing & FMCG
            ['name' => 'UNILEVER', 'logo' => 'unilever.png', 'category' => 'industrial'],
            ['name' => 'ZELLTECH', 'logo' => 'zelltech_logo.png', 'category' => 'industrial'],
            ['name' => 'PT JAVA MINING FERTILIZO', 'logo' => 'jmf.png', 'category' => 'industrial'],

            // Retail, Services & Lifestyle
            ['name' => 'DIANCA GOODS', 'logo' => 'dianca_goods.png', 'category' => 'retail'],
            ['name' => 'QUEEN AISYA SALON & SPA', 'logo' => 'queen_aisyah.jpg', 'category' => 'retail'],
            ['name' => 'AMOEBA', 'logo' => 'amoeba.png', 'category' => 'retail'],
            ['name' => 'KANA', 'logo' => 'kana.png', 'category' => 'retail'],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
