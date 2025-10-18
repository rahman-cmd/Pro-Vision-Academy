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
                'country' => 'United States',
                'content' => 'The Advanced Dental Implantology course completely transformed my practice. The hands-on training and expert instruction gave me the confidence to offer implant services to my patients. The techniques I learned have significantly improved my success rates.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Mark Stevens',
                'country' => 'United States',
                'content' => 'Excellent course on orthodontic fundamentals! The instructors were knowledgeable and the curriculum was well-structured. I particularly appreciated the practical sessions and the opportunity to network with other professionals.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Rachel Kim',
                'country' => 'United States',
                'content' => 'The Endodontic Excellence course exceeded my expectations. The advanced techniques and use of modern technology have revolutionized my approach to root canal therapy. Highly recommended for any endodontist looking to enhance their skills.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Thomas Brown',
                'country' => 'United States',
                'content' => 'The Cosmetic Dentistry Mastery course was phenomenal. Learning from Dr. Thompson and other experts in the field was invaluable. The smile design principles and veneer techniques I learned have elevated the quality of my cosmetic work.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Susan Lee',
                'country' => 'United States',
                'content' => 'As a pediatric dentist, the behavior management techniques taught in this course have been game-changing. The instructors provided practical strategies that I use daily in my practice. My young patients are now more comfortable during treatments.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Robert Garcia',
                'country' => 'United States',
                'content' => 'The Oral Surgery Fundamentals course provided excellent training in advanced surgical techniques. The hands-on experience and mentorship from experienced surgeons helped me refine my skills and improve patient outcomes.',
                'rating' => 4,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Maria Gonzalez',
                'country' => 'United States',
                'content' => 'The Digital Dentistry Revolution course opened my eyes to the possibilities of modern technology. Learning about CAD/CAM systems and digital workflows has made my practice more efficient and my patients happier with faster results.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Kevin Wang',
                'country' => 'United States',
                'content' => 'The Periodontal Therapy Update course was incredibly informative. The latest advances in laser therapy and regenerative procedures have enhanced my treatment options. The course materials and follow-up support were excellent.',
                'rating' => 4,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Lisa Chen',
                'country' => 'United States',
                'content' => 'The Practice Management Excellence course was exactly what I needed as a new practice owner. The business strategies, team management techniques, and marketing insights have helped me build a successful and profitable practice.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Andrew Miller',
                'country' => 'United States',
                'content' => 'The Emergency Dentistry Protocols course prepared me for handling complex emergency situations. The systematic approach to trauma management and pain control has been invaluable in my emergency practice.',
                'rating' => 4,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Patricia Davis',
                'country' => 'United States',
                'content' => 'Outstanding educational experience! The course content was comprehensive and the instructors were world-class. I particularly appreciated the small class sizes which allowed for personalized attention and hands-on practice.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
            [
                'name' => 'Dr. Christopher Taylor',
                'country' => 'United States',
                'content' => 'The quality of education and the networking opportunities were exceptional. I made valuable connections with colleagues and learned cutting-edge techniques that have improved my clinical outcomes significantly.',
                'rating' => 5,
                'status' => 'active',
                'image' => null,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
