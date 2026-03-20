<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['name' => 'Ramadhani Tegar Perkasa', 'position' => 'Founder & Commissioner', 'photo' => 'tegar.jpg'],
            ['name' => 'Luffi Aditya Sandy', 'position' => 'CEO & Founder', 'photo' => 'luffi.jpg'],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
