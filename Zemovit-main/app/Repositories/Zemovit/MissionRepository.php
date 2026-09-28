<?php

namespace App\Repositories\Zemovit;

 use App\Models\Zemovit\Mission;
use App\Repositories\MainRepository;

class MissionRepository extends MainRepository
{
    public function __construct(Mission $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Mission/';
        // pass the files that want to save
        $this->files = ['image'];
    }
    public function getMission()
    {
        return $this->model->where('is_show', 1)->first();
    }

}
