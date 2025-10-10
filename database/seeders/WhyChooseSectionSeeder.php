<?php

namespace Database\Seeders;

use App\Models\WhyChooseSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $whyChooseSections = [
            [
                'title' => 'Expert Faculty',
                'description' => 'Learn from internationally recognized dental experts with decades of clinical experience and teaching expertise.',
                'icon' => 'fas fa-user-md',
                'content' => 'Our faculty consists of board-certified specialists, published researchers, and internationally recognized experts who bring real-world experience to the classroom. Each instructor has extensive clinical practice and teaching credentials.',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title' => 'Hands-On Training',
                'description' => 'Practice with real patients and state-of-the-art equipment in our modern clinical facilities.',
                'icon' => 'fas fa-hands',
                'content' => 'Experience comprehensive hands-on training in our fully equipped clinical facilities. Work with actual patients under expert supervision, using the same advanced equipment you\'ll find in modern dental practices.',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title' => 'Latest Technology',
                'description' => 'Access cutting-edge dental technology including digital imaging, CAD/CAM systems, and laser dentistry.',
                'icon' => 'fas fa-microchip',
                'content' => 'Stay ahead of the curve with access to the latest dental technologies including digital radiography, intraoral scanners, CAD/CAM systems, laser therapy equipment, and 3D printing capabilities.',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'title' => 'Flexible Scheduling',
                'description' => 'Choose from weekend, evening, and intensive course formats that fit your busy professional schedule.',
                'icon' => 'fas fa-calendar-alt',
                'content' => 'We understand the demands of dental practice. Our courses are offered in multiple formats including weekend intensives, evening sessions, and online components to accommodate your professional schedule.',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'title' => 'Continuing Education Credits',
                'description' => 'Earn ADA CERP credits and meet your continuing education requirements while advancing your skills.',
                'icon' => 'fas fa-certificate',
                'content' => 'All our courses are approved for ADA CERP credits and meet continuing education requirements for dental professionals. Advance your career while fulfilling your professional development obligations.',
                'sort_order' => 5,
                'status' => 'active',
            ],
            [
                'title' => 'Small Class Sizes',
                'description' => 'Benefit from personalized attention with limited enrollment and low student-to-instructor ratios.',
                'icon' => 'fas fa-users',
                'content' => 'We maintain small class sizes to ensure personalized attention and optimal learning outcomes. Our low student-to-instructor ratio allows for individualized feedback and mentoring.',
                'sort_order' => 6,
                'status' => 'active',
            ],
            [
                'title' => 'International Recognition',
                'description' => 'Receive certificates recognized worldwide and join our global network of dental professionals.',
                'icon' => 'fas fa-globe',
                'content' => 'Our programs are internationally recognized and our certificates are accepted worldwide. Join a global network of dental professionals and expand your career opportunities internationally.',
                'sort_order' => 7,
                'status' => 'active',
            ],
            [
                'title' => 'Lifetime Support',
                'description' => 'Access ongoing support, refresher courses, and our alumni network throughout your career.',
                'icon' => 'fas fa-handshake',
                'content' => 'Your learning doesn\'t end with graduation. Access lifetime support including refresher courses, case consultations, and our extensive alumni network for ongoing professional development.',
                'sort_order' => 8,
                'status' => 'active',
            ],
        ];

        foreach ($whyChooseSections as $section) {
            WhyChooseSection::create($section);
        }
    }
}
