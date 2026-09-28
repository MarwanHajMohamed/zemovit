<?php

namespace App\Services\Zemovit;

use App\Repositories\Zemovit\BannerRepository;
use App\Repositories\Zemovit\FaqRepository;
use App\Repositories\Zemovit\WhyChooseUsRepository;
use App\Services\MainService;
use App\Models\Zemovit\Faq;

class WhyChooseUsService extends MainService
{
    public function __construct(
        private WhyChooseUsRepository $repository)
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
    public function getWhyChooseUs()
    {
     return $this->repository->getWhyChooseUs();
    }


}
