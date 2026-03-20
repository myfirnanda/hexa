<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Mark Stevenson',
                'role' => 'CEO at TechFlow',
                'quote' => 'Hexavara Tech transformed our vision into a scalable product within months. Their technical depth and commitment to quality are unparalleled.',
                'rating' => 5,
            ],
            [
                'name' => 'Lisa Ray',
                'role' => 'VP of Engineering, Nexus',
                'quote' => 'Working with the Hexavara team was like adding a group of experts to our own office. Professional, communicative, and exceptionally skilled.',
                'rating' => 5,
            ],
            [
                'name' => 'James Carter',
                'role' => 'Founder, Quantum Labs',
                'quote' => "They don't just build what you ask for; they suggest what you actually need. Their strategic thinking has been vital for our growth.",
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
