<?php

namespace App\Repositories\Zemovit;

 use App\Models\Zemovit\Blog;
use App\Repositories\MainRepository;

class BlogRepository extends MainRepository
{
    public function __construct(Blog $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Blog/';
        // pass the files that want to save
        $this->files = ['image'];
    }
 

}
