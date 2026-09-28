<?php

namespace App\Repositories\Zemovit;


use App\Models\Zemovit\Faq;
use App\Repositories\MainRepository;

class FaqRepository extends MainRepository
{
    public function __construct(Faq $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Faq/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
