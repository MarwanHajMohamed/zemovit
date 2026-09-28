<?php

namespace App\Services\Zemovit;



use App\Repositories\Zemovit\PageNameRepository;
use App\Services\MainService;

class PageNameService extends MainService
{
//    use SEOTools;
    public function __construct(private PageNameRepository $repository)
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

    public function usedPages()
    {
        return $this->get()->pluck('name')->toArray();
    }
    public function getWhere($where)
    {
        return $this->repository->getWhere($where);
    }
    public function setSeo($title = null, $description = null, $image = null, $url = null, $keywords = null, $type = null)
    {
        $url = $url ?? url()->current();
        if ($title != null) {
            $this->seo()->setTitle($title);
        }
        if ($description != null) {
            $this->seo()->setDescription($description);
        }
        if ($keywords != null) {
            $this->seo()->metatags()->addMeta('keywords', $keywords);
        }
        $this->seo()->opengraph()->setUrl($url);
        $this->seo()->setCanonical($url);
        if ($image != null) {
            $this->seo()->opengraph()->addImage(showFile($image));
            $this->seo()->jsonLd()->addImage(showFile($image));
        }
        $this->seo()->jsonLd()->setType($type);
    }

}
