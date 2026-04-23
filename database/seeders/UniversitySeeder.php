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
            'Government University', 
            'Government College',
            'Private College',
            'Private University',
        ];

        foreach ($universities as $name) {
            University::firstOrCreate(
                ['name' => $name],
                ['is_active' => true]
            );
        }
    }
}