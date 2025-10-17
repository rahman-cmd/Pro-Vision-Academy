<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure only one active record exists for the About section
        $existingActive = AboutSection::where('status', 'active')->first();
        if ($existingActive) {
            return; // Keep existing data if present
        }

        AboutSection::create([
            'title' => 'About Pro Vision Academy',
            'content' => 'We are dedicated to advancing dental education through innovative training programs, expert instruction, and state-of-the-art facilities.',
            'item_one_title' => 'Advanced Technology',
            'item_one_content' => 'Learn with the latest dental technology and equipment used in modern practices worldwide.',
            'item_two_title' => 'Expert Instructors',
            'item_two_content' => 'Learn from renowned dental professionals with decades of experience and expertise.',
            'item_three_title' => 'Accredited Programs',
            'item_three_content' => 'All our courses are fully accredited and recognized by international dental boards.',
        ]);
    }
}