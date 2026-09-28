<?php

namespace App\Repositories\Zemovit;

 use App\Models\Zemovit\Mission;
use App\Models\Zemovit\Vision;
use App\Repositories\MainRepository;

class VissionRepository extends MainRepository
{
    public function __construct(Vision $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/vision/';
        // pass the files that want to save
        $this->files = ['image'];
    }
    public function getVision()
    {
        return $this->model->where('is_show', 1)->first();
    }

}
