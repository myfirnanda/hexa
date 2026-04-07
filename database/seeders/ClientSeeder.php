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
            ['name' => 'University of Indonesia (UI)', 'logo' => 'clients/univ_indonesia.png', 'category' => 'education'],
            ['name' => 'Airlangga University (UNAIR)', 'logo' => 'clients/unair.png', 'category' => 'education'],
            ['name' => 'ITS - Sepuluh Nopember Institute of Technology', 'logo' => 'clients/its.png', 'category' => 'education'],
            ['name' => 'UBAYA - University of Surabaya', 'logo' => 'clients/ubaya.png', 'category' => 'education'],
            ['name' => 'ROUDLOTUL FALAH', 'logo' => 'clients/roudlotul_falah.png', 'category' => 'education'],

            // Government & Public Sector
            ['name' => 'KOMINFO', 'logo' => 'clients/kominfo.png', 'category' => 'government'],
            ['name' => 'BKD JATIM', 'logo' => 'clients/bkd_jatim.png', 'category' => 'government'],
            ['name' => 'BANJARBARU', 'logo' => 'clients/banjarbaru.png', 'category' => 'government'],
            ['name' => 'BENGKULU', 'logo' => 'clients/kota_bengkulu.png', 'category' => 'government'],
            ['name' => 'LAMONGAN', 'logo' => 'clients/lamongan.png', 'category' => 'government'],
            ['name' => 'PAMEKASAN', 'logo' => 'clients/pamekasan.png', 'category' => 'government'],
            ['name' => 'DR SOETOMO HOSPITAL', 'logo' => 'clients/rs_soetomo.png', 'category' => 'government'],

            // SOE & Energy
            ['name' => 'TELKOM INDONESIA', 'logo' => 'clients/telkom.png', 'category' => 'soe'],
            ['name' => 'WIKA (Wijaya Karya)', 'logo' => 'clients/wika.png', 'category' => 'soe'],
            ['name' => 'PJB (PLN Nusantara Power)', 'logo' => 'clients/PJB_logo.png', 'category' => 'soe'],
            ['name' => 'BERAU COAL', 'logo' => 'clients/berau_coal.png', 'category' => 'soe'],

            // Banking & Finance
            ['name' => 'SINARMAS', 'logo' => 'clients/sinarmas.png', 'category' => 'finance'],
            ['name' => 'BANK BENGKULU', 'logo' => 'clients/bank_bengkulu.svg', 'category' => 'finance'],
            ['name' => 'BMT MUDA', 'logo' => 'clients/bmt_muda.png', 'category' => 'finance'],

            // Industrial, Manufacturing & FMCG
            ['name' => 'UNILEVER', 'logo' => 'clients/unilever.png', 'category' => 'industrial'],
            ['name' => 'ZELLTECH', 'logo' => 'clients/zelltech_logo.png', 'category' => 'industrial'],
            ['name' => 'PT JAVA MINING FERTILIZO', 'logo' => 'clients/jmf.png', 'category' => 'industrial'],

            // Retail, Services & Lifestyle
            ['name' => 'DIANCA GOODS', 'logo' => 'clients/dianca_goods.png', 'category' => 'retail'],
            ['name' => 'QUEEN AISYA SALON & SPA', 'logo' => 'clients/queen_aisyah.jpg', 'category' => 'retail'],
            ['name' => 'AMOEBA', 'logo' => 'clients/amoeba.png', 'category' => 'retail'],
            ['name' => 'KANA', 'logo' => 'clients/kana.png', 'category' => 'retail'],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
