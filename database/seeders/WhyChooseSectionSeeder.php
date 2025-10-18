<?php

namespace Database\Seeders;

use App\Models\WhyChooseSection;
use Illuminate\Database\Seeder;

class WhyChooseSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'heading_title' => 'Why Choose Pro Vision Academy',
            'cover_image' => 'why_choose/cover.jpg',
            'card_title_1' => 'Professional Courses',
            'card_content_1' => 'Our carefully curated programs cover a wide range of topics, from general dentistry to specialized fields, ensuring you stay ahead in your profession.',
            'card_title_2' => 'Expert-Led Training',
            'card_content_2' => 'Learn from renowned dental experts with years of experience in both clinical practice and education. Our instructors are committed to hands-on learning.',
            'card_title_3' => 'State-of-the-Art Facilities',
            'card_content_3' => 'Our center is equipped with the latest dental technology, offering a real-world environment for practical learning and skill development.',
            'card_title_4' => 'International Standards',
            'card_content_4' => 'All our courses follow international standards of dental education, ensuring you gain in-depth knowledge and practical skills with global recognition.',
            'status' => 'active',
        ];

        // Upsert by heading_title to keep seeding idempotent
        WhyChooseSection::updateOrCreate(
            ['heading_title' => $data['heading_title']],
            $data
        );
    }
}
