<?php

namespace App\Repositories\Zemovit;


use App\Models\Zemovit\Faq;
use App\Models\Zemovit\WhyChooseUs;
use App\Repositories\MainRepository;

class WhyChooseUsRepository extends MainRepository
{
    public function __construct(WhyChooseUs $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/WhyChooseUs/';
        // pass the files that want to save
        $this->files = ['image'];
    }
    //        $whyChooseUs = WhyChooseUs::with('translations')->take(6)->get();

    public function getWhyChooseUs() {
        return $this->model->take(6)->get();
    }

}
