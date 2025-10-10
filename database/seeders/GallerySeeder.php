<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Advanced Implantology Workshop',
                'description' => 'Hands-on training session during the Advanced Dental Implantology course with expert instructors guiding participants through surgical procedures.',
                'image' => 'gallery/implantology-workshop-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Dentists practicing implant placement techniques in workshop setting',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Modern Training Facility',
                'description' => 'State-of-the-art dental training facility equipped with the latest technology and equipment for comprehensive dental education.',
                'image' => 'gallery/training-facility-1.jpg',
                'category' => 'facilities',
                'alt_text' => 'Modern dental training facility with advanced equipment',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Orthodontics Practical Session',
                'description' => 'Students learning wire bending techniques and appliance adjustment during the Orthodontics Fundamentals course.',
                'image' => 'gallery/orthodontics-session-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Orthodontic training session with students practicing wire bending',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Digital Dentistry Lab',
                'description' => 'Cutting-edge digital dentistry laboratory featuring CAD/CAM systems, 3D printers, and digital impression scanners.',
                'image' => 'gallery/digital-lab-1.jpg',
                'category' => 'facilities',
                'alt_text' => 'Digital dentistry laboratory with CAD/CAM equipment',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Endodontic Microscopy Training',
                'description' => 'Participants learning advanced endodontic techniques using high-powered microscopes for precision root canal therapy.',
                'image' => 'gallery/endodontic-microscopy-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Endodontic training with microscope equipment',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Cosmetic Dentistry Demonstration',
                'description' => 'Live demonstration of veneer preparation and placement techniques during the Cosmetic Dentistry Mastery course.',
                'image' => 'gallery/cosmetic-demo-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Cosmetic dentistry demonstration showing veneer placement',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'Lecture Hall',
                'description' => 'Spacious lecture hall equipped with modern audiovisual systems for theoretical sessions and presentations.',
                'image' => 'gallery/lecture-hall-1.jpg',
                'category' => 'facilities',
                'alt_text' => 'Modern lecture hall with audiovisual equipment',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 7,
            ],
            [
                'title' => 'Pediatric Dentistry Workshop',
                'description' => 'Interactive session on behavior management techniques and child-friendly treatment approaches.',
                'image' => 'gallery/pediatric-workshop-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Pediatric dentistry workshop with child-friendly equipment',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'title' => 'Oral Surgery Simulation',
                'description' => 'Surgical simulation training using advanced mannequins and surgical instruments for oral surgery procedures.',
                'image' => 'gallery/oral-surgery-sim-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Oral surgery simulation training with mannequins',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 9,
            ],
            [
                'title' => 'Student Lounge',
                'description' => 'Comfortable student lounge area for networking, relaxation, and informal discussions between course sessions.',
                'image' => 'gallery/student-lounge-1.jpg',
                'category' => 'facilities',
                'alt_text' => 'Comfortable student lounge with seating areas',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 10,
            ],
            [
                'title' => 'Periodontal Laser Training',
                'description' => 'Hands-on training with laser technology for periodontal therapy and soft tissue procedures.',
                'image' => 'gallery/laser-training-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Periodontal laser training session',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 11,
            ],
            [
                'title' => 'Certificate Ceremony',
                'description' => 'Graduation ceremony where participants receive their course completion certificates and celebrate their achievements.',
                'image' => 'gallery/certificate-ceremony-1.jpg',
                'category' => 'events',
                'alt_text' => 'Certificate presentation ceremony with graduates',
                'status' => 'active',
                'is_featured' => true,
                'sort_order' => 12,
            ],
            [
                'title' => 'Practice Management Seminar',
                'description' => 'Business-focused seminar covering practice management, marketing strategies, and financial planning for dental professionals.',
                'image' => 'gallery/practice-management-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Practice management seminar with business presentation',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 13,
            ],
            [
                'title' => 'Emergency Dentistry Simulation',
                'description' => 'Emergency response training with realistic scenarios for handling dental trauma and urgent care situations.',
                'image' => 'gallery/emergency-sim-1.jpg',
                'category' => 'courses',
                'alt_text' => 'Emergency dentistry simulation training',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 14,
            ],
            [
                'title' => 'Networking Reception',
                'description' => 'Welcome reception providing opportunities for participants to network with instructors and fellow dental professionals.',
                'image' => 'gallery/networking-reception-1.jpg',
                'category' => 'events',
                'alt_text' => 'Networking reception with dental professionals',
                'status' => 'active',
                'is_featured' => false,
                'sort_order' => 15,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
