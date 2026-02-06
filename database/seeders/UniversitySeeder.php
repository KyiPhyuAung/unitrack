<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        $universities = [
            'University of Yangon',
            'Yangon Technological University',
            'University of Mandalay',
            'Mandalay Technological University',
            'Dagon University',
        ];

        foreach ($universities as $name) {
            University::create(['name' => $name]);
        }
    }
}
