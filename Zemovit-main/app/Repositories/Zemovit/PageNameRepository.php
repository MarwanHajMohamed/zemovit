<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\PageName;
use App\Repositories\MainRepository;

class PageNameRepository extends MainRepository
{
    public function __construct(PageName $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/PageName/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
