<?php

namespace App\Http\Controllers\Site;

use App\Enums\PageNameTypeisEnum;
use App\Http\Controllers\Controller;
use App\Models\Zemovit\About;
use App\Services\Zemovit\AboutService;
use App\Services\Zemovit\MissionService;
use App\Services\Zemovit\PageNameService;
use App\Services\Zemovit\VissionService;
use Artesaos\SEOTools\Facades\SEOMeta;

class AboutController extends Controller
{

    public function index(AboutService $abouts ,PageNameService $pageNameService , MissionService $mission_service , VissionService $vission_service) {
        $abouts = $abouts->get();
        $mission = $mission_service->first();
        $vision = $vission_service->first();
        $seo_date = $pageNameService->getWhere(['name' => PageNameTypeisEnum::AboutUs->value])->first();
        $this->setSeo(@$seo_date->seoSettings->title ?? '',@$seo_date->seoSettings->description,@$seo_date->seoSettings->image,url()->full(),@$seo_date->seoSettings->keywords ?? []);
        return view('site.about', compact(['abouts','mission','vision']));
    }

    private function setSeo($title, $description, $image, $url, $keywords = null)
    {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($url);

        if ($keywords) {
            SEOMeta::setKeywords($keywords);
        }
        return [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'url' => $url,
            'keywords' => $keywords,
        ];
    }

}
