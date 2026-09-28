<?php

namespace Database\Seeders;

use App\Models\Zemovit\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run()
    {
        $sections = [
            [
                'image' => 'img/07a42ffb-57c3-454a-90de-2fee4385cf5f.jpg',
                'is_show' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'About Us',
                        'subtitle' => 'Who are',
                        'subtitle2' =>'Zemovit',
                        'description' => 'Zemovit was founded in London by a team with pharmaceutical backgrounds and one shared belief: better health should be available to everyone...',
                    ],
                ],
            ],
            [
                'image' => 'img/a79ed803-f744-42a2-a37c-cecb0d9c9c47.jpg',
                'is_show' => 1,
                'translations' => [
                    'en' => [
                        //
                        'title' => 'Our Mission',
                        'subtitle' => 'Serving Your Health from Lab to Life',
                        'description' => 'At Zemovit, we make wellness accessible by combining clinical-grade science with the time-tested power of natural medicine...',
                    ],
                ],
            ],
            [
                'image' => 'img/22c9a5e2-ef22-4a60-bb60-79aa66115435.jpg',
                'is_show' => 1,
                'translations' => [
                    //
                    'en' => [
                        'title' => 'Our Vision',
                        'subtitle' => 'A Healthier Tomorrow for Everyone',
                        'description' => 'Our vision is to lead the transformation of the healthcare industry in the region...',
                    ],
                ],
            ],
        ];
        foreach ($sections as $sectionData) {
            $section = About::create([
                'image' => $sectionData['image'],
                'is_show' => $sectionData['is_show'],
            ]);

            foreach ($sectionData['translations'] as $locale => $translationData) {
                $section->translations()->create([
                    'locale' => $locale,
                    'title' => $translationData['title'],
                    'subtitle' => $translationData['subtitle'],
                    'description' => $translationData['description'],
                ]);
            }
        }
    }
}
