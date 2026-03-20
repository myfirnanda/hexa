<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            // Main services
            ['name' => 'Software Development', 'slug' => 'software-development', 'description' => 'We create tailored software from scratch — web platforms, mobile apps, GIS-based systems — using agile methods that keep you in control at every milestone.', 'icon' => 'code', 'type' => 'main'],
            ['name' => 'Startup & Incubator', 'slug' => 'startup-incubator', 'description' => 'From idea validation to MVP launch, we help early-stage ventures build, test, and scale with the right tech stack and go-to-market strategy.', 'icon' => 'rocket_launch', 'type' => 'main'],
            ['name' => 'Managed Services', 'slug' => 'managed-services', 'description' => 'Focus on growing your business while we handle the tech. Our managed services cover hosting, monitoring, maintenance, and 24/7 support.', 'icon' => 'settings_suggest', 'type' => 'main'],

            // Additional services
            ['name' => 'Digital Branding', 'slug' => 'digital-branding', 'description' => 'We build cohesive digital identities — logos, style guides, social media assets — that communicate your brand story consistently across every platform.', 'icon' => 'palette', 'type' => 'additional'],
            ['name' => 'Advertising', 'slug' => 'advertising', 'description' => 'Data-driven ad campaigns across search, social, and display channels to maximize your reach and return on ad spend.', 'icon' => 'campaign', 'type' => 'additional'],
            ['name' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'description' => 'User-centered interfaces designed for clarity and delight, from wireframes and prototypes to polished production-ready designs.', 'icon' => 'design_services', 'type' => 'additional'],
            ['name' => 'Business Consultant', 'slug' => 'business-consultant', 'description' => 'Strategic business advisory to help you identify growth opportunities, optimize operations, and make data-driven decisions.', 'icon' => 'business_center', 'type' => 'additional'],
            ['name' => 'Accounting Consultant', 'slug' => 'accounting-consultant', 'description' => 'Expert accounting advisory to streamline financial processes, ensure compliance, and improve reporting accuracy.', 'icon' => 'account_balance', 'type' => 'additional'],
            ['name' => 'HR Consultant', 'slug' => 'hr-consultant', 'description' => 'People-first HR consulting to build performance cultures, design compensation structures, and improve talent acquisition.', 'icon' => 'groups', 'type' => 'additional'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
