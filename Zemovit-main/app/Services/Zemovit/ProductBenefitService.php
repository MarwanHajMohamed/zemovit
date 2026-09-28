<?php

namespace App\Services\Zemovit;

use App\Services\MainService;
use App\Models\Zemovit\ProductBenefit;

class ProductBenefitService extends MainService
{
    public function __construct(ProductBenefit $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/ProductBenefit/';
        // pass the files that want to save
        $this->files = ['image'];
    }
    public function getDataTable()
    {
        return $this->model->query()
            ->when(request('product_id'), function ($q) {
                return $q->where('product_id', request('product_id'));
            })
            ->latest();
    }

}
