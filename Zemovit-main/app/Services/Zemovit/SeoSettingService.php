<?php

namespace App\Services\Zemovit;

use App\Repositories\Zemovit\PageNameRepository;
use App\Repositories\Zemovit\SeoSettingRepository;
use App\Services\MainService;

class SeoSettingService
{
    public function __construct(private SeoSettingRepository $repository, private PageNameRepository $pageNameRepository)
    {

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

    public function storeSeo($data)
    {
        $pageName = $this->pageNameRepository->store($data);
        $data['page_name_id'] = $pageName->id;
        return $this->repository->store($data);
    }

    public function getWhere($where)
    {
        return $this->repository->getWhere($where)->get();
    }

    public function getWhereFirst($where)
    {
        return $this->repository->getWhereFirst($where)->first();
    }
    public function usedPages()
    {
        return $this->get()->pluck('name')->toArray();
    }

}
