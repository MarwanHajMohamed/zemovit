<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\Product;
use App\Models\Zemovit\ProductWarning;
use App\Repositories\MainRepository;

class ProductWarningRepository extends MainRepository
{
    public function __construct(ProductWarning $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Product/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
