<?php

namespace App\Http\Controllers\Site;

use App\Enums\PageNameTypeisEnum;
use App\Http\Controllers\Controller;
use App\Models\Zemovit\Product;
use App\Models\Zemovit\TherapeuticArea;
use App\Services\Zemovit\PageNameService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request,PageNameService $pageNameService)
    {
        $locale = app()->getLocale();
        $category = $request->query('category', 'All');
        $query = Product::query();
        if ($category !== 'All') {
            $query->whereHas('therapeuticAreas', function($q) use ($category, $locale) {
                $slug = (array)$category;
                $q->whereHas('translations', function($q) use ($slug, $locale) {
                    $q->whereIn('slug', $slug)
                        ->where('locale', $locale);
                });
            });
        }
        $products = $query->get();
        $categories = TherapeuticArea::with([
            'translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            }
        ])->get();
        $seo_date = $pageNameService->getWhere(['name' => PageNameTypeisEnum::Products->value])->first();
        $this->setSeo(@$seo_date->seoSettings->title ?? '',@$seo_date->seoSettings->description,@$seo_date->seoSettings->image,url()->full(),@$seo_date->seoSettings->keywords ?? []);
        return view('site.products.index', [
            'products' => $products,
            'categories' => $categories,
            'currentCategory' => $category
        ]);
    }
    public function show(Request $request, $slug,PageNameService $pageNameService)
    {

        $locale = app()->getLocale();
        $product = Product::with([
            'translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            },
            'details.translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            },
            'benefits.translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            },
            'warnings.translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            },
            'therapeuticArea.translations' => function($q) use ($locale) {
                $q->where('locale', $locale);
            }
        ])->whereHas('translations', function($q) use ($slug, $locale) {
            $q->where('locale', $locale)->where('slug', $slug);
        })->firstOrFail();

        $seo_date = $pageNameService->getWhere(['name' => PageNameTypeisEnum::Products->value])->first();
        $title = optional($product)->title ?? '';
        $description = optional($product)->description ?? '';
        $image = isset($product->image) ? asset('storage/' . $product->image) : null;
        $keywords = optional(optional($seo_date)->seoSettings)->keywords ?? [];
        $this->setSeo($title, $description, $image, url()->full(), $keywords);
        return view('site.products.show', compact('product'));

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
