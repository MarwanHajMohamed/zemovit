<?php

namespace App\Repositories\Zemovit;
use App\Models\Zemovit\HomeSetting;
use App\Repositories\MainRepository;

class HomeSettingRepository extends MainRepository
{
    public function __construct(HomeSetting $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/HomeSetting/';
        // pass the files that want to save
        $this->files = ['image'];
    }

    public function getSectionsByPosition()
    {
        return $this->model->query()->orderBy('position')->get();
    }
    public function getOrderByAsc()
    {
        return $this->model->query()->orderBy('position', 'asc')
            ->where('is_show',1)
            ->get();

    }
    public static function getSection($section_name)
    {
        return HomeSetting::query()->where('section_name', $section_name)->first();
    }

}
