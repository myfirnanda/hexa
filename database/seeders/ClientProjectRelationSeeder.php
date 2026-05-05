<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ClientProjectRelationSeeder extends Seeder
{
    /**
     * Maps project slugs → client name (as stored in ClientSeeder).
     */
    private array $map = [
        // Software Development
        'indipro-telkom-surabaya'                                   => 'TELKOM INDONESIA',
        'aegis-sistem-akademik'                                     => 'Airlangga University (UNAIR)',
        'e-sales-zelltech'                                          => 'ZELLTECH',
        'warehouse-system-mjs-unilever'                             => 'UNILEVER',
        'qps-wika-gedung'                                           => 'WIKA (Wijaya Karya)',
        'rescueid'                                                  => 'DR SOETOMO HOSPITAL',
        'sily'                                                      => 'LAMONGAN',
        'sipintar'                                                  => 'BANJARBARU',
        'bmoms'                                                     => 'PAMEKASAN',
        'foundation-donation-portal'                                => 'ROUDLOTUL FALAH',
        'simaster-bkd'                                              => 'BKD JATIM',
        'job-center-berau-coal-energy'                              => 'BERAU COAL',
        'e-trucking'                                                => 'PT JAVA MINING FERTILIZO',
        'dianca-goods'                                              => 'DIANCA GOODS',
        'ppdb-smpn-bengkulu'                                        => 'BENGKULU',
        'pjb-unite'                                                 => 'PJB (PLN Nusantara Power)',
        'spatial-planning-management-system-of-banjarbaru-regency' => 'BANJARBARU',
        'digital-archive-disdukcapil-kab-lamongan'                  => 'LAMONGAN',
        'digital-financial-platform-bmt-muda'                       => 'BMT MUDA',

        // Digital Branding
        'promotion-video-of-manufacturing-engineering-university-of-surabaya' => 'UBAYA - University of Surabaya',
        'rebranding-digital-marketing-queen-aisyah-salon-and-spa'             => 'QUEEN AISYA SALON & SPA',
        'aerial-video-company-profile-pt-jmf'                                  => 'PT JAVA MINING FERTILIZO',
    ];

    public function run(): void
    {
        // Cache all clients keyed by name to avoid N+1 queries
        $clients = Client::all()->keyBy('name');

        $linked   = 0;
        $skipped  = 0;

        foreach ($this->map as $slug => $clientName) {
            $client  = $clients->get($clientName);
            $project = Project::where('slug', $slug)->first();

            if (! $client) {
                $this->command->warn("  Client not found: \"{$clientName}\"");
                $skipped++;
                continue;
            }

            if (! $project) {
                $this->command->warn("  Project not found: slug=\"{$slug}\"");
                $skipped++;
                continue;
            }

            $project->update(['client_id' => $client->id]);
            $linked++;
        }

        $this->command->info("  Linked {$linked} project(s) to clients. Skipped {$skipped}.");
    }
}
