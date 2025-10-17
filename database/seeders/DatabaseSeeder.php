<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed in the correct order to maintain referential integrity
        $this->call([
            // Core data first
            UserSeeder::class,
            SettingSeeder::class,
            
            // Course-related data
            CourseSeeder::class,
            SpeakerSeeder::class,
            
            // Content sections
            HeroSectionSeeder::class,
            WhyChooseSectionSeeder::class,
            AboutSectionSeeder::class,
            
            // Additional content
            TestimonialSeeder::class,
            GallerySeeder::class,
            NewsSeeder::class,
            
            // Registration data (depends on users and courses)
            CourseRegistrationSeeder::class,
        ]);
    }
}
