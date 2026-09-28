<?php

namespace App\Repositories\Zemovit;

use App\Repositories\MainRepository;

class ProductImageRepository extends MainRepository
{
    public function __construct(ProductImage $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/ProductImage/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
