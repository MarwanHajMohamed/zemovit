<?php

namespace App\Repositories\Zemovit;

use App\Models\Zemovit\PageView;
use App\Repositories\MainRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageViewRepository extends MainRepository
{
    public function __construct(PageView $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Slider/';
        // pass the files that want to save
        $this->files = ['image'];
    }

    public function getPageViewChartData()
    {
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        return $this->model->select(
            DB::raw('DATE(date) as date'),
            DB::raw('SUM(views) as views')
        )
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy(DB::raw('DATE(date)'))
            ->orderBy('date')
            ->get();
    }
    public function getPageViewChartPagesData()
    {
        $startDate = Carbon::now()->subDays(30);
        $endDate = Carbon::now();
        $data = $this->model->select(
            DB::raw('SUM(views) as views'), 'page_link')
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('page_link')
            ->get();

        foreach ($data as $key => $page) {
            $data[$key]['page_link'] = trans('zemovit.' . $page->page_link);
        }
        return $data;
    }

}
