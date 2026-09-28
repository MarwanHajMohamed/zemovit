<?php

namespace App\Http\Controllers\Zemovit;

use App\Http\Controllers\Controller;
use App\Services\Zemovit\TherapeuticAreaService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Services\Zemovit\ProductService as objService;
use App\Http\Requests\Zemovit\ProductRequest as objRequest;

class ProductController extends Controller
{
    public string $folderPath = "zemovit.products";
    public string $mainRoute = "products";

    public function index(Request $request, objService $service , TherapeuticAreaService $objService)
    {
        if ($request->ajax()) {
            $dataTable = $service->getDataTable(); //therapeutic_area_id
            return DataTables::of($dataTable)
                ->addIndexColumn()
                ->editColumn('therapeutic_area', function ($data) {
                    $titles  = $data->therapeuticAreas->pluck('title:en');
                    return $titles->values() ?? [];
                })
                ->editColumn('title',function($data){
                    return $data->{'title:en'} ?? '--';
                })->editColumn('description',function($data){
                    return $data->{'description:en'} ?? '--';
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
        $data['therapeutic_areas'] = $objService->get();
        return view($this->folderPath . '.index', $data);
    }

    public function create(Request $request, objService $service ,TherapeuticAreaService $objService)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
                'therapeutic_areas' => $objService->get()
            // Pass additional data if needed
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function store(objRequest $request, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->storeProduct($dataInsert);
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

    public function edit(int $id, Request $request, objService $service,TherapeuticAreaService $objService)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".edit")->with([
                'updateRoute' => route($this->mainRoute . ".update", $id),
                "obj" => $service->find($id),
                'therapeutic_areas' => $objService->get()


            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function update(objRequest $request, int $id, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->updateProduct($id, $dataInsert);
        return jsonSuccess($data);
    }

    public function destroy(int $id, objService $service)
    {
        $service->delete($id);
        return jsonSuccess();
    }
}
