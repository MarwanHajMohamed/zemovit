<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\Banner;
use App\Repositories\MainRepository;

class BannerRepository extends MainRepository
{
    public function __construct(Banner $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Banner/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
