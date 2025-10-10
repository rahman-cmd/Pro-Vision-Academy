<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroSections = [
            [
                'title' => 'Excellence in Dental Education',
                'subtitle' => 'Transform Your Practice with Professional Training',
                'description' => 'Join thousands of dental professionals who have advanced their careers through our comprehensive courses. From basic techniques to cutting-edge procedures, we provide the education you need to excel in modern dentistry.',
                'background_image' => 'hero/dental-education-hero.jpg',
                'button_text' => 'Explore Courses',
                'button_link' => '/courses',
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'title' => 'Advanced Implantology Training',
                'subtitle' => 'Master the Art of Dental Implants',
                'description' => 'Our comprehensive implantology program combines theoretical knowledge with hands-on practice. Learn from industry experts and gain the confidence to perform complex implant procedures with precision and success.',
                'background_image' => 'hero/implantology-hero.jpg',
                'button_text' => 'Learn More',
                'button_link' => '/courses/implantology',
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'title' => 'Digital Dentistry Revolution',
                'subtitle' => 'Embrace the Future of Dental Practice',
                'description' => 'Stay ahead of the curve with our digital dentistry courses. Master CAD/CAM technology, 3D printing, and digital workflows that are transforming modern dental practices worldwide.',
                'background_image' => 'hero/digital-dentistry-hero.jpg',
                'button_text' => 'Get Started',
                'button_link' => '/courses/digital-dentistry',
                'status' => 'active',
                'sort_order' => 3,
            ],
            [
                'title' => 'Cosmetic Dentistry Mastery',
                'subtitle' => 'Create Beautiful Smiles with Confidence',
                'description' => 'Develop your aesthetic skills with our comprehensive cosmetic dentistry program. Learn the latest techniques in smile design, veneers, and aesthetic restorations from renowned cosmetic dentists.',
                'background_image' => 'hero/cosmetic-dentistry-hero.jpg',
                'button_text' => 'View Program',
                'button_link' => '/courses/cosmetic-dentistry',
                'status' => 'active',
                'sort_order' => 4,
            ],
            [
                'title' => 'Continuing Education Credits',
                'subtitle' => 'Maintain Your Professional License',
                'description' => 'Fulfill your continuing education requirements with our accredited courses. All programs are designed to meet state licensing requirements while providing practical knowledge you can use immediately.',
                'background_image' => 'hero/continuing-education-hero.jpg',
                'button_text' => 'Browse CE Courses',
                'button_link' => '/courses?category=continuing-education',
                'status' => 'active',
                'sort_order' => 5,
            ],
            [
                'title' => 'Pediatric Dentistry Excellence',
                'subtitle' => 'Specialized Care for Young Patients',
                'description' => 'Enhance your pediatric dentistry skills with our specialized training programs. Learn behavior management techniques, age-appropriate treatments, and create positive dental experiences for children.',
                'background_image' => 'hero/pediatric-dentistry-hero.jpg',
                'button_text' => 'Discover More',
                'button_link' => '/courses/pediatric-dentistry',
                'status' => 'inactive',
                'sort_order' => 6,
            ],
            [
                'title' => 'Periodontal Therapy Update',
                'subtitle' => 'Latest Advances in Gum Disease Treatment',
                'description' => 'Stay current with the latest periodontal therapy techniques including laser treatment, regenerative procedures, and non-surgical approaches to treating gum disease effectively.',
                'background_image' => 'hero/periodontal-therapy-hero.jpg',
                'button_text' => 'Learn Techniques',
                'button_link' => '/courses/periodontal-therapy',
                'status' => 'inactive',
                'sort_order' => 7,
            ],
            [
                'title' => 'Emergency Dentistry Protocols',
                'subtitle' => 'Be Prepared for Dental Emergencies',
                'description' => 'Master emergency dentistry procedures and protocols. Learn to handle urgent dental situations with confidence, from trauma management to pain control and emergency treatments.',
                'background_image' => 'hero/emergency-dentistry-hero.jpg',
                'button_text' => 'Emergency Training',
                'button_link' => '/courses/emergency-dentistry',
                'status' => 'inactive',
                'sort_order' => 8,
            ],
        ];

        foreach ($heroSections as $heroSection) {
            HeroSection::create($heroSection);
        }
    }
}
