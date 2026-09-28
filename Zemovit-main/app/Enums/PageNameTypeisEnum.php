<?php

namespace App\Enums;

enum PageNameTypeisEnum: string
{
    case Home = 'home';
    case AboutUs = 'about_us';
    case Products = 'products';
    case Contact = 'contact';
    case Blog ='blog';

    public function lang()
    {
        return match ($this) {
            self::Home => __('zemovit.home'),
            self::AboutUs => __('zemovit.about_us'),
            self::Products => __('zemovit.products'),
            self::Contact => __('zemovit.contact'),
            self::Blog => __('zemovit.blog'),
        };
    }
}
