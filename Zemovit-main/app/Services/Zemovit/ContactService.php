<?php

namespace App\Services\Zemovit;

use App\Services\MainService;
use App\Models\Zemovit\Contact;

class ContactService extends MainService
{
    public function __construct(Contact $model)
    {
        $this->model = $model;
        $this->fileFolder = 'images/Contact/';
        // pass the files that want to save
        $this->files = ['image'];
    }

}