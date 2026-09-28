<?php

namespace App\Repositories\Zemovit;


use App\Models\Zemovit\Faq;
use App\Models\Zemovit\TherapeuticArea;
use App\Models\Zemovit\WhyChooseUs;
use App\Repositories\MainRepository;
use App\Services\Zemovit\TherapeuticAreaService;

class TherapeuticAreaRepository extends MainRepository
{
    public function __construct(TherapeuticArea $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/TherapeuticArea/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}
