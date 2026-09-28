<?php

namespace App\Http\Controllers\Site;

use App\Enums\PageNameTypeisEnum;
use App\Http\Controllers\Controller;
use App\Models\Zemovit\Contact;
use App\Models\Zemovit\Faq;
use App\Services\Zemovit\PageNameService;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(PageNameService $pageNameService)
    {
        $seo_date = $pageNameService->getWhere(['name' => PageNameTypeisEnum::Contact->value])->first();
        $this->setSeo(@$seo_date->seoSettings->title ?? '',@$seo_date->seoSettings->description,@$seo_date->seoSettings->image,url()->full(),@$seo_date->seoSettings->keywords ?? []);
        return view('site.contact');
    }
    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Contact::create([
            'full_name'=>$request->name,
            'email' => $request->email,
            'massage' => $request->message
        ]);
        return jsonSuccess();
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
