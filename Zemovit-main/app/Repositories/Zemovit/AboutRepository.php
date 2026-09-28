<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\About;
use App\Repositories\MainRepository;

class AboutRepository extends MainRepository
{
    public function __construct(About $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/About/';
        // pass the files that want to save
        $this->files = ['image'];
    }
    public function getAbout()
    {
        return $this->model->where('is_show', 1)->first();
    }

}
