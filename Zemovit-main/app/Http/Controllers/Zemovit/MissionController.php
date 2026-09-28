<?php

namespace App\Http\Controllers\Zemovit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use Yajra\DataTables\DataTables;
use App\Services\Zemovit\MissionService as objService;
use App\Http\Requests\Zemovit\MissionRequest as objRequest;

class MissionController extends Controller
{
    public string $folderPath = "zemovit.mission";
    public string $mainRoute = "missions";

    public function index(Request $request, ObjService $service)
    {
        $data["mission"] = $service->first();
        // dd($data["mission"]);
        $data["createRoute"] = route($this->mainRoute . ".create");
        $data["dataTableRoute"] = route($this->mainRoute . ".index");
        $data["bladeTitle"] = __("auth.admins");
        $data["addButtonText"] = __("auth.admin");
        $data["modalType"] = "";

        return view($this->folderPath . '.index', $data);
    }

    public function create(Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
             ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function store(objRequest $request, ObjService $service)
    {
        $data = $request->validated();
         $data = $service->store($data);
        return jsonSuccess($data, null, 201);
    }

    public function show(int $id, Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".show")->with([
                "obj" => $service->find($id),
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function edit(int $id, Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".edit")->with([
                'updateRoute' => route($this->mainRoute . ".update", $id),
                "obj" => $service->find($id),
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function update(objRequest $request, ObjService $service, $id)
    {
 
        $validData  = $request->validated();
         $data = $service->update($id,$validData);
        return jsonSuccess($data, null, 201);
    }
    public function destroy(int $id, objService $service)
    {
        $service->delete($id);
        return jsonSuccess();
    }
}
