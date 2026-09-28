<?php

namespace App\Services\Zemovit;

use App\Repositories\Zemovit\PageViewRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;


class PageViewService
{
    public function __construct(
        private PageViewRepository $repository)
    {

    }

    public function updateView($request)
    {
        // Get the current URL path
        $path = $request->page_link;

        // Remove the "ar" segment if it exists
        $pathParts = explode('/', $path);
        $cleanPath = implode('/', array_filter($pathParts, function ($part) {
            return $part !== 'ar' && $part !== 'en';
        }));

        $cleanPath = $cleanPath == "" ? "home" : $cleanPath;

        if (!isset($_COOKIE['page_' . $cleanPath])) {
            $model = $this->repository->getWhere(['page_link' => $cleanPath, 'date' => date('Y-m-d')])->first();
            if (!$model) {
                $this->store([
                    'page_link' => $cleanPath,
                    'date' => date('Y-m-d'),
                    'views' => 1,
                ]);
            } else {
                $this->update($model->id, [
                    'views' => $model->views + 1,
                ]);
            }

            // Calculate the number of seconds until the next 12:00 AM
            $currentDateTime = new DateTime();
            $nextMidnight = new DateTime('tomorrow midnight');
            $secondsUntilMidnight = $nextMidnight->getTimestamp() - $currentDateTime->getTimestamp();

            // Set the cookie with the cleaned up path
            setcookie('page_' . $cleanPath, true, time() + $secondsUntilMidnight, '/');
        }


    }

    public function pageViewChart()
    {
        return  $this->repository->getPageViewChartData();
    }

    public function pageViewChartPages()
    {
       return $this->repository->getPageViewChartPagesData();
    }

    public function getDataTable()
    {
        return $this->repository->getDataTable();
    }

    public function get()
    {
        return $this->repository->get();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function first()
    {
        return $this->repository->first();
    }


}
