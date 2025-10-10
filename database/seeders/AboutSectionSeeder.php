<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutSections = [
            [
                'title' => 'About Dental Course Academy',
                'content' => 'Dental Course Academy has been at the forefront of dental education for over two decades, providing world-class training to dental professionals worldwide. Our comprehensive programs combine cutting-edge technology with proven teaching methodologies to deliver exceptional learning experiences.

Founded by a team of renowned dental educators and practitioners, we have trained over 15,000 dental professionals across 50 countries. Our faculty consists of internationally recognized experts who bring real-world experience and the latest research findings directly to our students.

We believe that continuous learning is essential for professional growth and patient care excellence. Our courses are designed to meet the evolving needs of modern dentistry, incorporating the latest techniques, technologies, and best practices in the field.

Whether you are a recent graduate looking to expand your skills or an experienced practitioner seeking to stay current with the latest advances, Dental Course Academy provides the education and support you need to achieve your professional goals.',
                'image' => 'about/dental-academy-main.jpg',
                'mission' => 'To advance the practice of dentistry through exceptional education, innovative training methods, and continuous professional development opportunities that enhance patient care and improve oral health outcomes worldwide.',
                'vision' => 'To be the global leader in dental education, recognized for excellence in teaching, research, and professional development, while fostering a community of lifelong learners committed to advancing the dental profession.',
                'values' => 'Excellence: We maintain the highest standards in education and training.
Innovation: We embrace new technologies and teaching methods.
Integrity: We conduct ourselves with honesty and ethical principles.
Collaboration: We foster teamwork and knowledge sharing.
Patient-Centered Care: We prioritize patient welfare in all our teachings.
Continuous Improvement: We constantly evolve to meet changing needs.
Global Perspective: We serve dental professionals worldwide.
Accessibility: We make quality education available to all practitioners.',
                'status' => 'active',
            ],
            [
                'title' => 'Our History and Legacy',
                'content' => 'Established in 2001, Dental Course Academy began as a small continuing education provider with a vision to transform dental education. What started as weekend workshops in a single location has evolved into a comprehensive global education platform serving thousands of dental professionals annually.

Our journey began when Dr. Sarah Mitchell and Dr. James Rodriguez, both prominent figures in academic dentistry, recognized the need for practical, hands-on training that bridged the gap between dental school education and real-world practice. They assembled a team of expert clinicians and educators who shared their passion for teaching and commitment to excellence.

Over the years, we have expanded our offerings to include specialized programs in implantology, cosmetic dentistry, digital dentistry, pediatric care, and emergency protocols. Our state-of-the-art facilities feature the latest dental equipment and technology, providing students with an authentic learning environment.

Today, Dental Course Academy is proud to be accredited by major dental organizations and recognized as a leader in continuing dental education. Our alumni practice in leading dental clinics, hospitals, and academic institutions around the world, carrying forward the knowledge and skills they gained through our programs.',
                'image' => 'about/academy-history.jpg',
                'mission' => 'To preserve and advance the rich tradition of dental education while embracing innovation and modern teaching methodologies to prepare dental professionals for the challenges of contemporary practice.',
                'vision' => 'To build upon our legacy of excellence while continuously evolving to meet the future needs of dental education and professional development.',
                'values' => 'Tradition: Honoring the foundations of dental education.
Progress: Embracing change and innovation.
Mentorship: Guiding the next generation of dental professionals.
Quality: Maintaining exceptional educational standards.
Community: Building lasting professional relationships.
Research: Contributing to dental knowledge and advancement.',
                'status' => 'inactive',
            ],
            [
                'title' => 'Our Faculty and Expertise',
                'content' => 'Our distinguished faculty represents the pinnacle of dental expertise, bringing together leading practitioners, researchers, and educators from around the world. Each instructor is carefully selected based on their clinical excellence, teaching ability, and commitment to advancing dental education.

Dr. Amanda Foster, our Director of Implantology, has placed over 10,000 implants and authored numerous peer-reviewed publications on implant dentistry. Dr. Michael Chen leads our Digital Dentistry program, having pioneered several CAD/CAM techniques now used worldwide. Dr. Lisa Park, our Pediatric Dentistry specialist, has developed innovative behavior management protocols that have transformed pediatric dental care.

Our faculty members are active in professional organizations, serve on editorial boards of major dental journals, and regularly present at international conferences. They bring the latest research findings and clinical innovations directly to our classrooms, ensuring that our students receive the most current and relevant education available.

Beyond their technical expertise, our instructors are passionate educators who are committed to student success. They provide personalized attention, mentorship, and ongoing support to help each student achieve their learning objectives and professional goals.',
                'image' => 'about/faculty-team.jpg',
                'mission' => 'To provide students with access to world-class dental expertise through a faculty of distinguished practitioners and educators who are leaders in their respective fields.',
                'vision' => 'To maintain a faculty that represents the highest levels of clinical excellence, educational innovation, and professional leadership in dentistry.',
                'values' => 'Expertise: Maintaining the highest levels of clinical knowledge.
Teaching Excellence: Delivering exceptional educational experiences.
Mentorship: Guiding and supporting student development.
Innovation: Leading advances in dental education and practice.
Collaboration: Working together to achieve common goals.
Professional Development: Continuously advancing our own knowledge and skills.',
                'status' => 'inactive',
            ],
        ];

        foreach ($aboutSections as $aboutSection) {
            AboutSection::create($aboutSection);
        }
    }
}
