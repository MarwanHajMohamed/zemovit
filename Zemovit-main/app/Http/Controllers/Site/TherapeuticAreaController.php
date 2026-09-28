<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Zemovit\Product;
use App\Models\Zemovit\TherapeuticArea;
use App\Services\Zemovit\BlogService;
use App\Services\Zemovit\ProductService;
use App\Services\Zemovit\TherapeuticAreaService;

class TherapeuticAreaController extends Controller
{
    private $therapeuticArea;
    private $product_features;
    public function __construct(TherapeuticAreaService $therapeuticArea , ProductService $product_features , private BlogService $blog_service) {
        $this->therapeuticArea = $therapeuticArea;
        $this->product_features = $product_features;
    }
    public function index() {

        $therapeuticAreas = $this->therapeuticArea->get();
        $featuredProducts = $this->product_features->getProductFeature();
                $latest_blogs = $this->blog_service->get()->take(12);

        return view('site.therapeutic-area.index',compact('therapeuticAreas','featuredProducts' ,'latest_blogs'));
    }
}
