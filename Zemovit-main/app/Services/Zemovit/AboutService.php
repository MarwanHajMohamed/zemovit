<?php

namespace App\Services\Zemovit;
use App\Repositories\Zemovit\AboutRepository;
use App\Services\MainService;
use App\Models\Zemovit\About;

class AboutService extends MainService
{
    public function __construct(
        private AboutRepository $repository)
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
    public function storeAbout($data)
    {
        if ($data['is_show'] == 1) {
            About::query()->update(['is_show' => 0]);
        }
        return $this->repository->store($data);
    }
    public function updateAbout($id, $data)
    {
        if ($data['is_show'] == 1) {
            About::query()->update(['is_show' => 0]);
        }
        return $this->repository->update($id, $data);
    }
    public function getAbout()
    {
        return $this->repository->getAbout();
    }

}
