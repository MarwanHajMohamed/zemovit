<?php

namespace App\Repositories\Zemovit;

 use App\Models\Zemovit\Blog;
use App\Models\Zemovit\BlogImage;
use App\Repositories\MainRepository;

class BlogImageRepository extends MainRepository
{
    public function __construct(BlogImage $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Blog/';
        // pass the files that want to save
        $this->files = ['image'];
    }
 

}
