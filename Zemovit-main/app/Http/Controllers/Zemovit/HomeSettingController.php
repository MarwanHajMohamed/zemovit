<?php

namespace App\Http\Controllers\Zemovit;

use App\Enums\SectionNamesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Zemovit\HomeSettingRequest as objRequest;
use App\Services\Zemovit\HomeSettingService as objService;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public string $folderPath = "zemovit.home_settings";
    public string $mainRoute = "home-settings";

    public function index(Request $request, objService $service)
    {

        $data["createRoute"] = route($this->mainRoute . ".create");
        $data["dataTableRoute"] = route($this->mainRoute . ".index");
        $data["bladeTitle"] = helperTrans($this->folderPath);
        $data["addButtonText"] = helperTrans($this->folderPath);
        $data["sections"] = $service->getSectionsByPosition();
        return view($this->folderPath . '.index', $data);
    }

    public function create(Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
                // Pass additional data if needed
                'section_names' => SectionNamesEnum::cases(),
                'usedSectionNames' => $service->getUsedSectionNames()
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function store(objRequest $request, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->store($dataInsert);
        $sections = $service->getSectionsByPosition();
        $html = view($this->folderPath . ".render", compact('sections'))->render();
        return jsonSuccess(['html' => $html, 'sections' => $sections], null, 201);
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
                'section_names' => SectionNamesEnum::cases()
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function update(objRequest $request, int $id, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->update($id, $dataInsert);
        $sections = $service->get();
        $html = view($this->folderPath . ".render", compact('sections'))->render();
        return jsonSuccess(['html' => $html], null, 201);
    }

    public function destroy(int $id, objService $service)
    {
        $service->delete($id);
        return jsonSuccess();
    }
}
