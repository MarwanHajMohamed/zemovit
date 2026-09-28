<?php

namespace App\Http\Controllers\Site;

use App\Enums\PageNameTypeisEnum;
use App\Enums\SectionNamesEnum;
use App\Http\Controllers\Controller;
use App\Models\Zemovit\Blog;
use App\Models\Zemovit\BlogTranslation;
use App\Models\Zemovit\HomeSetting;
 
 
use App\Services\Zemovit\BlockService;
use App\Services\Zemovit\BlogService;
use App\Services\Zemovit\HomeSettingService;
use App\Services\Zemovit\PageNameService;
 
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

class BlogController extends Controller
{
  
    public function __construct(
       private BlogService $blog_service
    )
    {
 

    }
    public function index(PageNameService $pageNameService , HomeSettingService $home_setting_service)
     {

        $blogs = $this->blog_service->get();
      
        $seo_date = $pageNameService->getWhere(['name' => PageNameTypeisEnum::Blog->value])->first();
        // dd(SectionNamesEnum::Blog->value);
        $blog_data = $home_setting_service->getWhereFirst(['section_name'=>SectionNamesEnum::Blog->value]);
        $this->setSeo(@$seo_date->seoSettings->title ?? 
        'Complete Medical Solutions for a Healthier Life. Quality pharmaceuticals and nutritional supplements.',
        @$seo_date->seoSettings->description,@$seo_date->seoSettings->image,url()->full(),
        @$seo_date->seoSettings->keywords ?? []);
          return view('site.blogs',compact(
            'blogs','blog_data'
      
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

    public function show(Request $request, $slug,PageNameService $pageNameService)
    {

        $locale = app()->getLocale();
$blog = Blog::with('images', 'translations')
    ->whereHas('translations', function ($q) use ($slug, $locale) {
        $q->where('slug', $slug)->where('locale', $locale);
    })
    ->firstOrFail();
 
         $title = optional($blog)->title ?? '';
        $description = optional($blog)->description ?? '';
        $image = isset($blog->image) ? asset('storage/' . $blog->image) : null;
         $this->setSeo($title, $description, $image, url()->full());
        return view('site.blogdetails',compact(
            'blog',
      
        ));
      

    }
    
}
