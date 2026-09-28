<?php

namespace App\Http\Controllers\Zemovit;

use App\Enums\PageNameTypeisEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Zemovit\SeoSettingRequest as objRequest;
use App\Models\Zemovit\SeoSetting;
use App\Services\Zemovit\PageNameService;
use App\Services\Zemovit\SeoSettingService;
use App\Services\Zemovit\SeoSettingService as objService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SeoSettingController extends Controller
{
    public string $folderPath = "zemovit.seo_settings";
    public string $mainRoute = "seo-settings";

    public function index(Request $request, PageNameService $service)
    {
        if ($request->ajax()) {
            $dataTable = $service->getDataTable();
            return DataTables::of($dataTable)
                ->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return Str::limit(@$row->seoSettings->{"title:en"}, 35, '...');
                })
                ->addColumn('description', function ($row) {
                    return Str::limit(@$row->seoSettings->{"description:en"}, 35, '...');
                })
                ->addColumn('image', function ($row) {
                    return getImgTag(@$row->seoSettings->image);
                })
                ->editColumn('name', function ($row) {
                    return @PageNameTypeisEnum::tryFrom($row->name)->lang();
                })
                ->addColumn('actions', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                    $editButton = editButton(route($this->mainRoute . ".edit", $row->id), $row->name);
                    $deleteButton = deleteButton(route($this->mainRoute . ".destroy", $row->id));
                    return $editButton . " " . $deleteButton;
                })
                ->escapeColumns([])
                ->make(true);
        }

        $data["createRoute"] = route($this->mainRoute . ".create");
        $data["dataTableRoute"] = route($this->mainRoute . ".index");
        $data["bladeTitle"] = helperTrans($this->folderPath);
        $data["addButtonText"] = helperTrans($this->folderPath);
        return view($this->folderPath . '.index', $data);
    }

    public function create(Request $request, PageNameService $pageNameService)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
                // Pass additional data if needed
                'pageNames' => PageNameTypeisEnum::cases(),
                'usedPages' => $pageNameService->usedPages(),
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function store(objRequest $request, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->storeSeo($dataInsert);
        return jsonSuccess($data);
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

    public function edit(int $id, Request $request, PageNameService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".edit")->with([
                'updateRoute' => route($this->mainRoute . ".update", $id),
                "obj" => $service->find($id),
                'pageNames' => PageNameTypeisEnum::cases(),
                'usedPages' => $service->usedPages(),
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function update(objRequest $request, int $id, PageNameService $service, SeoSettingService $seoSettingService)
    {
        $dataInsert = $request->validated();
        $pageTitlesData = Arr::only($dataInsert, ['name']);
        $seoData = Arr::only($dataInsert, ['ar', 'en', 'image']);
        $service->update($id, $pageTitlesData);
        $objSeoSettings = $seoSettingService->getWhereFirst(['page_name_id' => $id]);
        $seoSettingService->update($id, $seoData);
        return jsonSuccess();

    }

    public function destroy(int $id, PageNameService $service)
    {
        $service->delete($id);
        return jsonSuccess();
    }
}
