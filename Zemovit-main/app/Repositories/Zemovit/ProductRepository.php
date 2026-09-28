<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\Product;
use App\Repositories\MainRepository;

class ProductRepository extends MainRepository
{
    public function __construct(Product $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Product/';
        // pass the files that want to save
        $this->files = ['image'];
    }

    public function getProductDataTable()
{
    return $this->model->query()
        ->when(request('therapeutic_area_id'),function ($q){
            $therapeuticAreaIds = (array) request('therapeutic_area_id');
            $q->whereHas('therapeuticAreas', function ($query) use ($therapeuticAreaIds) {
                $query->whereIn('therapeutic_areas.id', $therapeuticAreaIds);
            });
        })
        ->latest();
}
public function getFeaturedProduct()
{
    return $this->model->query()
        ->where('is_featured',1)
        ->latest()->get();
}

}
