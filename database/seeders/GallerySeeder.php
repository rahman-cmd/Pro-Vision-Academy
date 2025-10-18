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
                'image' => 'gallery/training-facility-1.jpg',
                'image_title' => 'Training Facility 1',
                'status' => 'active',
            ],
            [
                'image' => 'gallery/training-facility-2.jpg',
                'image_title' => 'Training Facility 2',
                'status' => 'active',
            ],
            [
                'image' => 'gallery/training-facility-3.jpg',
                'image_title' => 'Training Facility 3',
                'status' => 'active',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
