<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed a single settings record aligned with the Setting model fields
        $data = [
            'business_name'    => 'Dental Course Academy',
            'email'            => 'info@dentalcourseacademy.com',
            'phone'            => '+1 (555) 123-4567',
            'address'          => '123 Dental Education Blvd, Suite 456, Medical City, MC 12345',
            'logo'             => 'images/logo.png',
            'favicon'          => 'images/favicon.ico',
            'description'      => 'Leading provider of professional dental education courses and certifications for dental professionals worldwide.',
            'copyright'        => '© '.date('Y').' Dental Course Academy. All rights reserved.',
            'google_analytics' => 'GA-XXXXXXXXX-X',
            'google_maps'      => 'https://maps.google.com/?q=Dental+Course+Academy',
            'facebook'         => 'https://facebook.com/dentalcourseacademy',
            'twitter'          => 'https://twitter.com/dentalcourseacad',
            'instagram'        => 'https://instagram.com/dentalcourseacademy',
            'linkedin'         => 'https://linkedin.com/company/dental-course-academy',
            'status'           => 'active',
        ];

        // Remove any existing records to ensure a clean seed
        Setting::query()->delete();
        Setting::create($data);
    }
}
