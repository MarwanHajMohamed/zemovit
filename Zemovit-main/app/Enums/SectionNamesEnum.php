<?php

namespace App\Enums;

enum SectionNamesEnum: string
{
    case Banner = 'banner';
    case TherapeuticArea = 'therapeutic_area';
    case FeaturedProducts = 'feature_products';
    case WhyChooseUs = 'why_choose_us';
    case AllProducts = 'all_products';
    case Contact = 'contact';
    Case Blog = 'blog';
    case LatestBlogs = 'latest_blogs';

    public function lang()
    {
        return match ($this) {
            self::Banner => __('zemovit.banner'),
            self::AllProducts => __('zemovit.products'),
            self::FeaturedProducts => __('zemovit.features_products'),
            self::TherapeuticArea => __('zemovit.therapeutic_areas'),
            self::Contact => __('zemovit.contact_us'),
            self::WhyChooseUs => __('zemovit.why-choose-us'),
            self::LatestBlogs => __('lastes blogs'), 
            Self::Blog => __('zemovit.blog'),

        };
    }

    public static function count(): int
    {
        return count(self::cases()) ;
    }
}
