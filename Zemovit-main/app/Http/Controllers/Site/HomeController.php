<?php

namespace App\Http\Controllers\Site;

use App\Enums\PageNameTypeisEnum;
use App\Enums\SectionNamesEnum;
use App\Http\Controllers\Controller;
use App\Models\Zemovit\About;
use App\Models\Zemovit\Banner;
use App\Models\Zemovit\HomeSetting;
use App\Models\Zemovit\Product;
use App\Models\Zemovit\TherapeuticArea;
use App\Models\Zemovit\WhyChooseUs;
use App\Services\Zemovit\AboutService;
use App\Services\Zemovit\BannerService;
use App\Services\Zemovit\BlogService;
use App\Services\Zemovit\PageNameService;
use App\Services\Zemovit\ProductService;
use App\Services\Zemovit\WhyChooseUsService;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    private $bannerService;
    private $aboutService;
    private $whyChooseUsService;

    public function __construct(
        BannerService $bannerService,
        PageNameService $pageNameService,
        AboutService  $aboutService,
        WhyChooseUsService $whyChooseUsService,
        private ProductService $product_features
    ) {
        $this->bannerService = $bannerService;
        $this->aboutService = $aboutService;
        $this->whyChooseUsService = $whyChooseUsService;
    }
    public function index(PageNameService $pageNameService)
    {

        $banner = $this->bannerService->first();
        $about = $this->aboutService->getAbout();
        $seo_date = $pageNameService->getWhere(['name' => PageNameTypeisEnum::Home->value])->first();
        $this->setSeo(@$seo_date->seoSettings->title ?? 'Complete Medical Solutions for a Healthier Life. Quality pharmaceuticals and nutritional supplements.', @$seo_date->seoSettings->description, @$seo_date->seoSettings->image, url()->full(), @$seo_date->seoSettings->keywords ?? []);
        $whyChooseUs = $this->whyChooseUsService->getWhyChooseUs();
        $home_setting = $this->getHomeSectionOrderByAsc();
       // $featuredProducts = $this->product_features->getProductFeature();

      $ids = [7, 8, 4, 12, 10];

$featuredProducts = Product::query()
    ->whereIn('id', $ids)
    ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")")
    ->get();

   
        // dd($home_setting);
        return view('site.index', compact(
            'banner',
            'about',
            'whyChooseUs',
            'home_setting',
            'featuredProducts',
         ));
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
    private function getHomeSectionOrderByAsc()
    {
        return HomeSetting::query()
            ->whereIn('section_name', [
                SectionNamesEnum::WhyChooseUs,
                SectionNamesEnum::Banner,
                SectionNamesEnum::FeaturedProducts,
             ])
            ->orderBy('position', 'asc')
            ->where('is_show', 1)
            ->get();
    }
}
