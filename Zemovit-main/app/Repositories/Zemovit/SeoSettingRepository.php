<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\SeoSetting;
use App\Repositories\MainRepository;

class SeoSettingRepository extends MainRepository
{
    public function __construct(SeoSetting $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/SeoSetting/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
