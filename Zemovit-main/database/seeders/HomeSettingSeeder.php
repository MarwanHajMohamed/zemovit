<?php

namespace Database\Seeders;

use App\Enums\SectionNamesEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('home_setting_translations')->delete();
        DB::table('home_settings')->delete();
        $sections = [
            [
                'section_name' => SectionNamesEnum::TherapeuticArea->value,
                'image' => 'img/therapeutic.jpg',
                'is_show' => true,
                'position' => 3,
                'translations' => [
                    [
                        'locale' => 'en',
                        'title' => 'Therapeutic Areas',
                        'subtitle' => 'Specialized Healthcare Solutions',
                        'subtitle2' => 'Targeted Treatments',
                        'description' => 'Explore our comprehensive therapeutic areas including energy metabolism, immunity support, bone health, and specialized care for all life stages.'
                    ],

                ]
            ],
            [
                'section_name' => SectionNamesEnum::Banner->value,
                'image' => 'img/therapeutic.jpg',
                'is_show' => true,
                'position' => 3,
                'translations' => [
                    [
                        'locale' => 'en',
                        'title' => 'Banner',
                        'subtitle' => 'Banner',
                        'subtitle2' => 'Banner',
                        'description' => 'Banner'
                    ],

                ]
            ],
            [
                'section_name' => SectionNamesEnum::FeaturedProducts->value,
                'image' => 'img/products.jpg',
                'is_show' => true,
                'position' => 5,
                'translations' => [
                    [
                        'locale' => 'en',
                        'title' => 'Our Products',
                        'subtitle' => 'Trusted Formulations',
                        'subtitle2' => 'Science-Backed Solutions',
                        'description' => 'Discover our range of high-quality pharmaceutical products and supplements, each developed with clinical research and third-party testing.'
                    ],

                ]
            ],
            [
    'section_name' => SectionNamesEnum::LatestBlogs->value, // لازم يكون enum موجود
    'image' => 'img/blogs.jpg',
    'is_show' => true,
    'position' => 6,
    'translations' => [
        [
            'locale' => 'en',
            'title' => 'Latest Blogs',
            'subtitle' => 'Insights & Updates',
            'subtitle2' => 'Stay Informed',
            'description' => 'Read our latest blogs about health, wellness, and pharmaceutical industry updates.',
        ],
    ],
],

            [
                'section_name' => SectionNamesEnum::WhyChooseUs->value,
                'image' => 'img/why.jpg',
                'is_show' => true,
                'position' => 4,
                'translations' => [
                    [
                        'locale' => 'en',
                        'title' => 'Why Choose Us',
                        'subtitle' => 'The Zemovit Difference',
                        'subtitle2' => 'Excellence in Pharma',
                        'description' => 'We stand out through scientifically-backed formulas, clean ingredients, third-party testing, and dedicated support for both practitioners and patients.'
                    ],

                ]
            ],
            [
                'section_name' => SectionNamesEnum::AllProducts->value,
                'image' => 'img/why.jpg',
                'is_show' => true,
                'position' => 5,
                'translations' => [
                    [
                        'locale' => 'en',
                        'title' => 'All Products',
                        'subtitle' => 'Browse our complete range of high-quality supplements',
                        'subtitle2' => 'Products',
                        'description' => 'We stand out through scientifically-backed formulas, clean ingredients, third-party testing, and dedicated support for both practitioners and patients.'
                    ],

                ]
            ],
            [
                'section_name' => SectionNamesEnum::Contact->value,
                'image' => 'img/why.jpg',
                'is_show' => true,
                'position' => 5,
                'translations' => [
                    [
                        'locale' => 'en',
                        'title' => 'Contact us',
                        'subtitle' => 'Let’s Talk',
                        'subtitle2' => 'goals',
                        'description' => 'We stand out through scientifically-backed formulas, clean ingredients, third-party testing, and dedicated support for both practitioners and patients.'
                    ],

                ]
            ],
        ];
        foreach ($sections as $section) {
            $homeSettingId = DB::table('home_settings')->insertGetId([
                'section_name' => $section['section_name'],
                'image' => $section['image'],
                'is_show' => $section['is_show'],
                'position' => $section['position'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $translations = array_map(function ($translation) use ($homeSettingId) {
                return [
                    'home_setting_id' => $homeSettingId,
                    'locale' => $translation['locale'],
                    'title' => $translation['title'],
                    'subtitle' => $translation['subtitle'],
                    'subtitle2' => $translation['subtitle2'],
                    'description' => $translation['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $section['translations']);
            DB::table('home_setting_translations')->insert($translations);
        }
    }
}
