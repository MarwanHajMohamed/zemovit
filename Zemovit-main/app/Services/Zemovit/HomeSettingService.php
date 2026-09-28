<?php

namespace App\Services\Zemovit;

use App\Enums\SectionNamesEnum;
use App\Repositories\Zemovit\HomeSettingRepository;
use App\Services\MainService;

class HomeSettingService
{
    public function __construct(private HomeSettingRepository $repository)
    {

    }

    public function getDataTable()
    {
        return $this->repository->getDataTable();
    }

    public function getWhere($where)
    {
        return $this->repository->getWhere($where)->get();
    }

    public function getWhereFirst($where)
    {
        return $this->repository->getWhereFirst($where);
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

    public function getUsedSectionNames()
    {
        return $this->repository->where('section_name','!=',SectionNamesEnum::Banner->value)->get()->pluck('section_name')->toArray();
    }

    public function getSectionsByPosition()
    {
        return $this->repository->getSectionsByPosition();
    }


}
