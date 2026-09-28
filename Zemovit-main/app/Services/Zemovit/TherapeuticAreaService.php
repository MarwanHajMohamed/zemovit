<?php

namespace App\Services\Zemovit;

use App\Repositories\Zemovit\AboutRepository;
use App\Repositories\Zemovit\TherapeuticAreaRepository;
use App\Services\MainService;
use App\Models\Zemovit\TherapeuticArea;

class TherapeuticAreaService extends MainService
{
    public function __construct(
        private TherapeuticAreaRepository $repository)
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
    public function first()
    {
        return $this->repository->first();
    }

}
