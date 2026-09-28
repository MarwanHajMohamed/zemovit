<?php

namespace App\Services\Zemovit;

use App\Repositories\Zemovit\BlogImageRepository;
use App\Services\MainService;
 use App\Repositories\Zemovit\BlogRepository;
use Illuminate\Support\Facades\DB;

class BlogService extends MainService
{
    public function __construct(
        private BlogRepository $repository , private BlogImageService $BlogImageService)
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
    DB::transaction(function () use ($data) {
        $blog = $this->repository->store($data);

        if (!empty($data['files'])) {
            foreach ($data['files'] as $file) {
                $mime = $file->getMimeType(); // ex: image/jpeg, image/png, image/svg+xml

                // حدد الـ media type
                if (str_starts_with($mime, 'image/')) {
                    $mediaType = 'image';
                } elseif (str_starts_with($mime, 'video/')) {
                    $mediaType = 'video';
                } else {
                    $mediaType = 'other';
                }

                $datafile = [
                    'blog_id'   => $blog->id,
                    'image'       => $file,
                    'type' => $mediaType,
                ];

                $this->BlogImageService->store($datafile);
            }
        }
    });
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
