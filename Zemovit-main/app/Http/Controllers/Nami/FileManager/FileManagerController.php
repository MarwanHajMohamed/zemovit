<?php

namespace App\Http\Controllers\Nami\FileManager;

use App\Enums\AdminTypeisEnum;
use App\Http\Controllers\Controller;
use App\Services\Nami\FileManagerService as ObjService;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    public string $folderPath = "nami.file_manager";

    public function index()
    {
        if (auth('admin')->user()->admin_type == AdminTypeisEnum::Developer->value) {

            return view($this->folderPath . '.index');
        }
        else{
            return redirect()->route('dashboard.index');
        }
    }

    public function create(Request $request)
    {
       //
    }

    public function store(Request $request, ObjService $service)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id)
    {
        //
    }

    public function update(Request $request, ObjService $service, $id)
    {
       //
    }

    public function destroy($id, Request $request, ObjService $service)
    {
       //
    }
}
