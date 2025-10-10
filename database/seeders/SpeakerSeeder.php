<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $speakers = [
            [
                'full_name' => 'Dr. Sarah Johnson',
                'country' => 'United States',
                'title' => 'Professor of Implantology',
                'bio' => 'Dr. Sarah Johnson is a world-renowned implantologist with over 20 years of experience in dental implant surgery and prosthetics. She has published over 100 research papers and is a sought-after international speaker.',
                'specialization' => 'Implantology',
                'institution' => 'Harvard School of Dental Medicine',
                'achievements' => 'Published 100+ research papers on implantology. Recipient of Excellence in Implant Dentistry Award 2020. International speaker at 50+ conferences.',
                'type' => 'international',
                'linkedin' => 'https://linkedin.com/in/drsarahjohnson',
                'website' => 'https://drsarahjohnson.com',
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'full_name' => 'Dr. Michael Chen',
                'country' => 'United States',
                'title' => 'Orthodontic Specialist',
                'bio' => 'Dr. Michael Chen is a leading orthodontist specializing in advanced orthodontic techniques and digital treatment planning. He has transformed thousands of smiles using cutting-edge technology.',
                'specialization' => 'Orthodontics',
                'institution' => 'UCLA School of Dentistry',
                'achievements' => 'Diplomate, American Board of Orthodontics. Invisalign Elite Provider. Pioneer in digital orthodontics.',
                'type' => 'local',
                'linkedin' => 'https://linkedin.com/in/drmichaelchen',
                'website' => 'https://drmichaelchen.com',
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'full_name' => 'Dr. Emily Rodriguez',
                'country' => 'Spain',
                'title' => 'Endodontic Expert',
                'bio' => 'Dr. Emily Rodriguez is an internationally recognized endodontist with expertise in complex root canal treatments and endodontic microsurgery. She has trained dentists worldwide in advanced endodontic techniques.',
                'specialization' => 'Endodontics',
                'institution' => 'University of Barcelona',
                'achievements' => 'Board Certified Endodontist. Developer of minimally invasive endodontic techniques. Author of 50+ peer-reviewed publications.',
                'type' => 'international',
                'linkedin' => 'https://linkedin.com/in/dremilyrodriguez',
                'website' => 'https://dremilyrodriguez.com',
                'status' => 'active',
                'sort_order' => 3,
            ],
            [
                'full_name' => 'Dr. David Thompson',
                'country' => 'United Kingdom',
                'title' => 'Oral Surgery Specialist',
                'bio' => 'Dr. David Thompson is a distinguished oral and maxillofacial surgeon with extensive experience in complex surgical procedures, dental implants, and facial reconstruction.',
                'specialization' => 'Oral Surgery',
                'institution' => 'King\'s College London',
                'achievements' => 'Fellow of the Royal College of Surgeons. Specialist in complex oral surgery. International lecturer on surgical techniques.',
                'type' => 'international',
                'linkedin' => 'https://linkedin.com/in/drdavidthompson',
                'website' => 'https://drdavidthompson.co.uk',
                'status' => 'active',
                'sort_order' => 4,
            ],
            [
                'full_name' => 'Dr. Lisa Park',
                'country' => 'South Korea',
                'title' => 'Prosthodontic Specialist',
                'bio' => 'Dr. Lisa Park is a leading prosthodontist specializing in complex restorative cases, full mouth rehabilitation, and aesthetic dentistry. She combines artistry with advanced dental technology.',
                'specialization' => 'Prosthodontics',
                'institution' => 'Seoul National University',
                'achievements' => 'Diplomate, American Board of Prosthodontics. Expert in digital dentistry. Award-winning aesthetic cases.',
                'type' => 'international',
                'linkedin' => 'https://linkedin.com/in/drlisapark',
                'website' => 'https://drlisapark.com',
                'status' => 'active',
                'sort_order' => 5,
            ],
            [
                'full_name' => 'Dr. Ahmed Hassan',
                'country' => 'Egypt',
                'title' => 'Periodontal Specialist',
                'bio' => 'Dr. Ahmed Hassan is a renowned periodontist with expertise in periodontal therapy, regenerative procedures, and dental implant placement. He has pioneered several innovative treatment protocols.',
                'specialization' => 'Periodontics',
                'institution' => 'Cairo University',
                'achievements' => 'Board Certified Periodontist. Pioneer in regenerative periodontal therapy. International research collaborator.',
                'type' => 'international',
                'linkedin' => 'https://linkedin.com/in/drahmedhassan',
                'website' => 'https://drahmedhassan.com',
                'status' => 'active',
                'sort_order' => 6,
            ],
            [
                'full_name' => 'Dr. Maria Santos',
                'country' => 'Brazil',
                'title' => 'Pediatric Dentistry Expert',
                'bio' => 'Dr. Maria Santos is a pediatric dentist with over 18 years of experience in treating children and adolescents. She specializes in behavior management and preventive care for young patients.',
                'specialization' => 'Pediatric Dentistry',
                'institution' => 'University of São Paulo',
                'achievements' => 'Diplomate, American Board of Pediatric Dentistry. Child behavior management expert. Advocate for preventive pediatric care.',
                'type' => 'international',
                'linkedin' => 'https://linkedin.com/in/drmariasantos',
                'website' => 'https://drmariasantos.com.br',
                'status' => 'active',
                'sort_order' => 7,
            ],
            [
                'full_name' => 'Dr. James Martinez',
                'country' => 'United States',
                'title' => 'Periodontal Surgeon',
                'bio' => 'Dr. James Martinez is a skilled periodontal surgeon specializing in advanced periodontal treatments, bone grafting, and soft tissue management. He is known for his minimally invasive surgical techniques.',
                'specialization' => 'Periodontics',
                'institution' => 'University of Southern California',
                'achievements' => 'Board Certified Periodontist. Expert in minimally invasive surgery. Developer of innovative grafting techniques.',
                'type' => 'local',
                'linkedin' => 'https://linkedin.com/in/drjamesmartinez',
                'website' => 'https://drjamesmartinez.com',
                'status' => 'active',
                'sort_order' => 8,
            ],
        ];

        foreach ($speakers as $speaker) {
            Speaker::create($speaker);
        }
    }
}
