<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Dr. Jennifer Adams',
                'position' => 'General Dentist',
                'company' => 'Smile Care Dental',
                'content' => 'The Advanced Dental Implantology course completely transformed my practice. The hands-on training and expert instruction gave me the confidence to offer implant services to my patients. The techniques I learned have significantly improved my success rates.',
                'rating' => 5,
                'location' => 'San Francisco, CA',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr. Mark Stevens',
                'position' => 'Orthodontist',
                'company' => 'Stevens Orthodontics',
                'content' => 'Excellent course on orthodontic fundamentals! The instructors were knowledgeable and the curriculum was well-structured. I particularly appreciated the practical sessions and the opportunity to network with other professionals.',
                'rating' => 5,
                'location' => 'Chicago, IL',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Dr. Rachel Kim',
                'position' => 'Endodontist',
                'company' => 'Root Canal Specialists',
                'content' => 'The Endodontic Excellence course exceeded my expectations. The advanced techniques and use of modern technology have revolutionized my approach to root canal therapy. Highly recommended for any endodontist looking to enhance their skills.',
                'rating' => 5,
                'location' => 'Los Angeles, CA',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Dr. Thomas Brown',
                'position' => 'Cosmetic Dentist',
                'company' => 'Aesthetic Dental Studio',
                'content' => 'The Cosmetic Dentistry Mastery course was phenomenal. Learning from Dr. Thompson and other experts in the field was invaluable. The smile design principles and veneer techniques I learned have elevated the quality of my cosmetic work.',
                'rating' => 5,
                'location' => 'Miami, FL',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Dr. Susan Lee',
                'position' => 'Pediatric Dentist',
                'company' => 'Children\'s Dental Care',
                'content' => 'As a pediatric dentist, the behavior management techniques taught in this course have been game-changing. The instructors provided practical strategies that I use daily in my practice. My young patients are now more comfortable during treatments.',
                'rating' => 5,
                'location' => 'Boston, MA',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'Dr. Robert Garcia',
                'position' => 'Oral Surgeon',
                'company' => 'Maxillofacial Surgery Center',
                'content' => 'The Oral Surgery Fundamentals course provided excellent training in advanced surgical techniques. The hands-on experience and mentorship from experienced surgeons helped me refine my skills and improve patient outcomes.',
                'rating' => 4,
                'location' => 'Houston, TX',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'name' => 'Dr. Maria Gonzalez',
                'position' => 'General Dentist',
                'company' => 'Modern Dental Practice',
                'content' => 'The Digital Dentistry Revolution course opened my eyes to the possibilities of modern technology. Learning about CAD/CAM systems and digital workflows has made my practice more efficient and my patients happier with faster results.',
                'rating' => 5,
                'location' => 'Phoenix, AZ',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Dr. Kevin Wang',
                'position' => 'Periodontist',
                'company' => 'Gum Health Specialists',
                'content' => 'The Periodontal Therapy Update course was incredibly informative. The latest advances in laser therapy and regenerative procedures have enhanced my treatment options. The course materials and follow-up support were excellent.',
                'rating' => 4,
                'location' => 'Atlanta, GA',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'name' => 'Dr. Lisa Chen',
                'position' => 'Practice Owner',
                'company' => 'Family Dental Group',
                'content' => 'The Practice Management Excellence course was exactly what I needed as a new practice owner. The business strategies, team management techniques, and marketing insights have helped me build a successful and profitable practice.',
                'rating' => 5,
                'location' => 'Denver, CO',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 9,
            ],
            [
                'name' => 'Dr. Andrew Miller',
                'position' => 'Emergency Dentist',
                'company' => 'Urgent Dental Care',
                'content' => 'The Emergency Dentistry Protocols course prepared me for handling complex emergency situations. The systematic approach to trauma management and pain control has been invaluable in my emergency practice.',
                'rating' => 4,
                'location' => 'Seattle, WA',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 10,
            ],
            [
                'name' => 'Dr. Patricia Davis',
                'position' => 'General Dentist',
                'company' => 'Community Dental Health',
                'content' => 'Outstanding educational experience! The course content was comprehensive and the instructors were world-class. I particularly appreciated the small class sizes which allowed for personalized attention and hands-on practice.',
                'rating' => 5,
                'location' => 'Portland, OR',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 11,
            ],
            [
                'name' => 'Dr. Christopher Taylor',
                'position' => 'Restorative Dentist',
                'company' => 'Advanced Restorative Care',
                'content' => 'The quality of education and the networking opportunities were exceptional. I made valuable connections with colleagues and learned cutting-edge techniques that have improved my clinical outcomes significantly.',
                'rating' => 5,
                'location' => 'Nashville, TN',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 12,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
