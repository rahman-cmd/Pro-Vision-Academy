<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Revolutionary Digital Dentistry Course Launches This Fall',
                'content' => 'We are excited to announce the launch of our groundbreaking Digital Dentistry Revolution course this fall. This comprehensive program will cover the latest advances in CAD/CAM technology, 3D printing applications, and digital workflow integration. Participants will gain hands-on experience with cutting-edge equipment and learn how to transform their practices with digital solutions. The course features expert instructors from leading dental technology companies and includes practical sessions with the newest digital tools. Early bird registration is now open with special pricing for the first 20 participants.',
                'excerpt' => 'New Digital Dentistry Revolution course launching this fall with hands-on training in CAD/CAM technology and 3D printing applications.',
                'image' => 'news/digital-dentistry-launch.jpg',
                'category' => 'course_announcements',
                'author' => 'Dr. Amanda Foster',
                'published_date' => now()->subDays(5),
                'status' => 'published',
                'is_featured' => true,
                'views' => 245,
                'slug' => 'revolutionary-digital-dentistry-course-launches-fall',
                'meta_description' => 'Learn about our new Digital Dentistry Revolution course featuring CAD/CAM technology, 3D printing, and digital workflows for modern dental practices.',
            ],
            [
                'title' => 'New Implantology Certification Program Receives ADA Approval',
                'content' => 'Our Advanced Dental Implantology certification program has received official approval from the American Dental Association (ADA). This recognition validates our comprehensive curriculum and high educational standards. The program covers surgical techniques, prosthetic restoration, bone grafting procedures, and patient management protocols. Graduates will receive ADA-recognized continuing education credits and a certificate of completion. The next cohort begins in January with limited spots available. This approval reinforces our commitment to providing world-class dental education that meets the highest professional standards.',
                'excerpt' => 'Our Advanced Dental Implantology certification program receives official ADA approval, validating our high educational standards.',
                'image' => 'news/ada-approval.jpg',
                'category' => 'certifications',
                'author' => 'Dr. Sarah Johnson',
                'published_date' => now()->subDays(12),
                'status' => 'published',
                'is_featured' => true,
                'views' => 189,
                'slug' => 'implantology-certification-program-ada-approval',
                'meta_description' => 'Our Advanced Dental Implantology certification program receives ADA approval, offering recognized continuing education credits.',
            ],
            [
                'title' => 'Breakthrough Research in Periodontal Laser Therapy',
                'content' => 'Recent clinical studies have shown remarkable results in periodontal laser therapy, with success rates exceeding 95% in treating moderate to severe gum disease. Our Periodontal Therapy Update course now incorporates these latest findings and techniques. The research demonstrates that laser-assisted periodontal treatment reduces healing time by 40% compared to traditional methods. Participants will learn the latest protocols for laser periodontal therapy, including patient selection criteria, treatment planning, and post-operative care. The course includes hands-on training with state-of-the-art laser equipment and case study analysis.',
                'excerpt' => 'New research shows 95% success rates in laser periodontal therapy, now incorporated into our updated course curriculum.',
                'image' => 'news/laser-therapy-research.jpg',
                'category' => 'research',
                'author' => 'Dr. James Martinez',
                'published_date' => now()->subDays(18),
                'status' => 'published',
                'is_featured' => true,
                'views' => 156,
                'slug' => 'breakthrough-research-periodontal-laser-therapy',
                'meta_description' => 'Discover breakthrough research in periodontal laser therapy showing 95% success rates and 40% faster healing times.',
            ],
            [
                'title' => 'International Dental Conference 2024: Key Takeaways',
                'content' => 'Our faculty recently attended the International Dental Conference 2024, bringing back valuable insights and innovations to enhance our course offerings. Key highlights include advances in biomaterials, AI applications in dentistry, and minimally invasive treatment techniques. The conference featured presentations from leading researchers and clinicians worldwide. We are incorporating these latest developments into our curriculum to ensure our participants receive the most current and relevant education. Special focus areas include regenerative dentistry, digital treatment planning, and patient communication strategies using modern technology.',
                'excerpt' => 'Our faculty shares key insights from the International Dental Conference 2024, including advances in biomaterials and AI applications.',
                'image' => 'news/dental-conference-2024.jpg',
                'category' => 'industry_news',
                'author' => 'Dr. Michael Chen',
                'published_date' => now()->subDays(25),
                'status' => 'published',
                'is_featured' => false,
                'views' => 98,
                'slug' => 'international-dental-conference-2024-key-takeaways',
                'meta_description' => 'Key insights from the International Dental Conference 2024 including biomaterials advances and AI applications in dentistry.',
            ],
            [
                'title' => 'Student Success Story: From General Practice to Implant Specialist',
                'content' => 'Dr. Jennifer Adams, a recent graduate of our Advanced Dental Implantology course, shares her inspiring journey from general practice to becoming a successful implant specialist. After completing our program, she has placed over 200 implants with a 98% success rate. Her practice revenue has increased by 150% since incorporating implant services. Dr. Adams credits the comprehensive training, hands-on experience, and ongoing mentorship provided by our program for her success. She now serves as a mentor for new course participants and continues to advance her skills through our continuing education programs.',
                'excerpt' => 'Dr. Jennifer Adams transforms her practice after completing our implantology course, achieving 98% success rate with 200+ implants.',
                'image' => 'news/student-success-story.jpg',
                'category' => 'success_stories',
                'author' => 'Course Administration',
                'published_date' => now()->subDays(30),
                'status' => 'published',
                'is_featured' => true,
                'views' => 312,
                'slug' => 'student-success-story-general-practice-implant-specialist',
                'meta_description' => 'Read Dr. Jennifer Adams success story: from general practice to implant specialist with 98% success rate after our course.',
            ],
            [
                'title' => 'New Pediatric Dentistry Techniques for Anxious Children',
                'content' => 'Our Pediatric Dentistry Essentials course now includes innovative behavior management techniques specifically designed for anxious children. These evidence-based approaches have shown significant improvement in patient cooperation and treatment outcomes. The updated curriculum covers distraction techniques, positive reinforcement strategies, and the use of technology to create a more comfortable environment for young patients. Participants will learn how to assess child anxiety levels, implement appropriate interventions, and create positive dental experiences that encourage lifelong oral health habits.',
                'excerpt' => 'Updated Pediatric Dentistry course includes new behavior management techniques for anxious children with proven results.',
                'image' => 'news/pediatric-techniques.jpg',
                'category' => 'course_updates',
                'author' => 'Dr. Lisa Park',
                'published_date' => now()->subDays(35),
                'status' => 'published',
                'is_featured' => false,
                'views' => 134,
                'slug' => 'new-pediatric-dentistry-techniques-anxious-children',
                'meta_description' => 'Learn about new pediatric dentistry techniques for managing anxious children in our updated course curriculum.',
            ],
            [
                'title' => 'Cosmetic Dentistry Trends: What Patients Want in 2024',
                'content' => 'The cosmetic dentistry landscape continues to evolve with new patient demands and technological advances. Our latest market research reveals the top trends for 2024, including natural-looking results, minimally invasive procedures, and same-day treatments. Patients are increasingly seeking subtle enhancements rather than dramatic transformations. Digital smile design has become essential for patient communication and treatment planning. Our Cosmetic Dentistry Mastery course has been updated to reflect these trends, with new modules on patient consultation techniques, digital workflow integration, and conservative treatment approaches.',
                'excerpt' => 'Discover the top cosmetic dentistry trends for 2024, including natural results and minimally invasive procedures.',
                'image' => 'news/cosmetic-trends-2024.jpg',
                'category' => 'industry_trends',
                'author' => 'Dr. David Thompson',
                'published_date' => now()->subDays(42),
                'status' => 'published',
                'is_featured' => false,
                'views' => 167,
                'slug' => 'cosmetic-dentistry-trends-patients-want-2024',
                'meta_description' => 'Explore 2024 cosmetic dentistry trends including natural results, minimally invasive procedures, and digital smile design.',
            ],
            [
                'title' => 'Emergency Dentistry Protocol Updates for Post-Pandemic Practice',
                'content' => 'The dental profession has adapted significantly since the pandemic, with new protocols and safety measures becoming standard practice. Our Emergency Dentistry Protocols course has been comprehensively updated to reflect current best practices in infection control, patient triage, and emergency treatment procedures. The updated curriculum includes telemedicine consultations, enhanced PPE protocols, and modified treatment approaches that prioritize both patient and provider safety. Participants will learn how to efficiently manage emergency cases while maintaining the highest safety standards.',
                'excerpt' => 'Updated Emergency Dentistry course reflects post-pandemic protocols including telemedicine and enhanced safety measures.',
                'image' => 'news/emergency-protocols-update.jpg',
                'category' => 'course_updates',
                'author' => 'Dr. Robert Wilson',
                'published_date' => now()->subDays(48),
                'status' => 'published',
                'is_featured' => false,
                'views' => 89,
                'slug' => 'emergency-dentistry-protocol-updates-post-pandemic',
                'meta_description' => 'Learn about updated emergency dentistry protocols including telemedicine consultations and enhanced safety measures.',
            ],
        ];

        foreach ($news as $article) {
            News::create($article);
        }
    }
}
