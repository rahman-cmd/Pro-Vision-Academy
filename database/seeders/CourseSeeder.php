<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Advanced Dental Implantology',
                'description' => 'Comprehensive course covering the latest techniques in dental implant placement, bone grafting, and prosthetic restoration. Learn from world-renowned experts in implantology.',
                'price' => 2500.00,
                'early_bird_price' => 2200.00,
                'early_bird_deadline' => now()->addDays(30),
                'start_date' => now()->addDays(60),
                'end_date' => now()->addDays(65),
                'duration' => '5 days',
                'location' => 'New York Dental Institute',
                'max_participants' => 25,
                'current_participants' => 0,
                'level' => 'advanced',
                'category' => 'implantology',
                'objectives' => json_encode([
                    'Master surgical techniques for implant placement',
                    'Understand bone grafting procedures',
                    'Learn prosthetic restoration protocols',
                    'Gain hands-on experience with latest technology'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Minimum 2 years clinical experience',
                    'Basic implant training preferred'
                ]),
                'status' => 'active',
                'is_featured' => true,
            ],
            [
                'title' => 'Orthodontics Fundamentals',
                'description' => 'Essential course for general dentists looking to incorporate orthodontic treatments into their practice. Covers basic principles and practical applications.',
                'price' => 1800.00,
                'early_bird_price' => 1600.00,
                'early_bird_deadline' => now()->addDays(45),
                'start_date' => now()->addDays(75),
                'end_date' => now()->addDays(78),
                'duration' => '4 days',
                'location' => 'Chicago Orthodontic Center',
                'max_participants' => 30,
                'current_participants' => 0,
                'level' => 'beginner',
                'category' => 'orthodontics',
                'objectives' => json_encode([
                    'Understand orthodontic diagnosis',
                    'Learn treatment planning basics',
                    'Master appliance selection',
                    'Practice wire bending techniques'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Active dental license',
                    'Interest in orthodontic treatment'
                ]),
                'status' => 'active',
                'is_featured' => true,
            ],
            [
                'title' => 'Endodontic Excellence',
                'description' => 'Advanced endodontic techniques including rotary instrumentation, obturation methods, and retreatment procedures. Enhance your root canal success rates.',
                'price' => 2200.00,
                'early_bird_price' => 1950.00,
                'early_bird_deadline' => now()->addDays(25),
                'start_date' => now()->addDays(50),
                'end_date' => now()->addDays(53),
                'duration' => '4 days',
                'location' => 'Los Angeles Endodontic Institute',
                'max_participants' => 20,
                'current_participants' => 0,
                'level' => 'intermediate',
                'category' => 'endodontics',
                'objectives' => json_encode([
                    'Master rotary instrumentation techniques',
                    'Learn advanced obturation methods',
                    'Understand retreatment protocols',
                    'Practice on extracted teeth'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Basic endodontic experience',
                    'Own loupes or microscope preferred'
                ]),
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'title' => 'Cosmetic Dentistry Mastery',
                'description' => 'Transform your practice with advanced cosmetic procedures. Learn veneers, bonding, whitening, and smile design principles from aesthetic dentistry leaders.',
                'price' => 3000.00,
                'early_bird_price' => 2700.00,
                'early_bird_deadline' => now()->addDays(40),
                'start_date' => now()->addDays(90),
                'end_date' => now()->addDays(95),
                'duration' => '6 days',
                'location' => 'Miami Aesthetic Dental Academy',
                'max_participants' => 18,
                'current_participants' => 0,
                'level' => 'advanced',
                'category' => 'cosmetic',
                'objectives' => json_encode([
                    'Master veneer preparation and placement',
                    'Learn composite bonding techniques',
                    'Understand smile design principles',
                    'Practice photography and communication'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Minimum 3 years clinical experience',
                    'Interest in aesthetic dentistry'
                ]),
                'status' => 'active',
                'is_featured' => true,
            ],
            [
                'title' => 'Pediatric Dentistry Essentials',
                'description' => 'Comprehensive training in pediatric dental care, behavior management, and specialized treatments for children. Perfect for general dentists treating young patients.',
                'price' => 1600.00,
                'early_bird_price' => 1400.00,
                'early_bird_deadline' => now()->addDays(35),
                'start_date' => now()->addDays(70),
                'end_date' => now()->addDays(72),
                'duration' => '3 days',
                'location' => 'Boston Children\'s Dental Center',
                'max_participants' => 25,
                'current_participants' => 0,
                'level' => 'beginner',
                'category' => 'pediatric',
                'objectives' => json_encode([
                    'Learn behavior management techniques',
                    'Understand pediatric treatment protocols',
                    'Master preventive care strategies',
                    'Practice emergency procedures'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Active dental license',
                    'Interest in treating children'
                ]),
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'title' => 'Oral Surgery Fundamentals',
                'description' => 'Essential surgical skills for general dentists including extractions, minor oral surgery, and emergency procedures. Build confidence in surgical dentistry.',
                'price' => 2000.00,
                'early_bird_price' => 1800.00,
                'early_bird_deadline' => now()->addDays(20),
                'start_date' => now()->addDays(45),
                'end_date' => now()->addDays(48),
                'duration' => '4 days',
                'location' => 'Houston Oral Surgery Institute',
                'max_participants' => 22,
                'current_participants' => 0,
                'level' => 'intermediate',
                'category' => 'oral_surgery',
                'objectives' => json_encode([
                    'Master extraction techniques',
                    'Learn suturing and wound management',
                    'Understand anesthesia protocols',
                    'Practice emergency procedures'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Basic surgical experience',
                    'Current CPR certification'
                ]),
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'title' => 'Digital Dentistry Revolution',
                'description' => 'Embrace the future of dentistry with digital workflows, CAD/CAM technology, 3D printing, and digital impressions. Transform your practice efficiency.',
                'price' => 2800.00,
                'early_bird_price' => 2500.00,
                'early_bird_deadline' => now()->addDays(50),
                'start_date' => now()->addDays(100),
                'end_date' => now()->addDays(104),
                'duration' => '5 days',
                'location' => 'Silicon Valley Digital Dental Lab',
                'max_participants' => 16,
                'current_participants' => 0,
                'level' => 'intermediate',
                'category' => 'digital_dentistry',
                'objectives' => json_encode([
                    'Master digital impression techniques',
                    'Learn CAD/CAM workflows',
                    'Understand 3D printing applications',
                    'Practice digital treatment planning'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Basic computer skills',
                    'Interest in technology'
                ]),
                'status' => 'active',
                'is_featured' => true,
            ],
            [
                'title' => 'Periodontal Therapy Update',
                'description' => 'Latest advances in periodontal treatment including laser therapy, regenerative procedures, and maintenance protocols. Improve your periodontal outcomes.',
                'price' => 1900.00,
                'early_bird_price' => 1700.00,
                'early_bird_deadline' => now()->addDays(30),
                'start_date' => now()->addDays(65),
                'end_date' => now()->addDays(67),
                'duration' => '3 days',
                'location' => 'Atlanta Periodontal Institute',
                'max_participants' => 24,
                'current_participants' => 0,
                'level' => 'intermediate',
                'category' => 'periodontics',
                'objectives' => json_encode([
                    'Learn laser therapy techniques',
                    'Understand regenerative procedures',
                    'Master maintenance protocols',
                    'Practice diagnostic methods'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Basic periodontal knowledge',
                    'Active dental license'
                ]),
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'title' => 'Practice Management Excellence',
                'description' => 'Business skills for dental professionals including team management, marketing, financial planning, and patient communication. Build a successful practice.',
                'price' => 1200.00,
                'early_bird_price' => 1000.00,
                'early_bird_deadline' => now()->addDays(25),
                'start_date' => now()->addDays(55),
                'end_date' => now()->addDays(56),
                'duration' => '2 days',
                'location' => 'Denver Business Center',
                'max_participants' => 40,
                'current_participants' => 0,
                'level' => 'beginner',
                'category' => 'practice_management',
                'objectives' => json_encode([
                    'Learn team leadership skills',
                    'Understand marketing strategies',
                    'Master financial planning',
                    'Improve patient communication'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Practice ownership or management role',
                    'Interest in business development'
                ]),
                'status' => 'active',
                'is_featured' => false,
            ],
            [
                'title' => 'Emergency Dentistry Protocols',
                'description' => 'Essential skills for handling dental emergencies including trauma, infections, and pain management. Be prepared for any emergency situation.',
                'price' => 1500.00,
                'early_bird_price' => 1300.00,
                'early_bird_deadline' => now()->addDays(15),
                'start_date' => now()->addDays(40),
                'end_date' => now()->addDays(41),
                'duration' => '2 days',
                'location' => 'Phoenix Emergency Dental Center',
                'max_participants' => 30,
                'current_participants' => 0,
                'level' => 'beginner',
                'category' => 'emergency',
                'objectives' => json_encode([
                    'Learn trauma management',
                    'Understand infection control',
                    'Master pain management protocols',
                    'Practice emergency procedures'
                ]),
                'requirements' => json_encode([
                    'DDS or DMD degree',
                    'Active dental license',
                    'Current CPR certification'
                ]),
                'status' => 'active',
                'is_featured' => false,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
