<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\Product;
use App\Models\Zemovit\ProductDetail;
use App\Repositories\MainRepository;

class ProductDetailRepository extends MainRepository
{
    public function __construct(ProductDetail $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/ProductDetail/';
        // pass the files that want to save
        $this->files = ['image'];
    }
    public function getProductDetialDataTable()
    {
        return $this->model->query()
            ->when(request('product_id'), function ($query, $productId) {
                return $query->where('product_id', $productId);
            })
            ->latest();
    }
}
