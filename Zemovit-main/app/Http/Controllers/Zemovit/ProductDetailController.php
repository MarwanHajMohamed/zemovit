<?php

namespace App\Http\Controllers\Zemovit;

use App\Http\Controllers\Controller;
use App\Models\Zemovit\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Services\Zemovit\ProductDetailService as objService;
use App\Http\Requests\Zemovit\ProductDetailRequest as objRequest;

class ProductDetailController extends Controller
{
    public string $folderPath = "zemovit.product_details";
    public string $mainRoute = "products-details";

    public function index(Request $request, objService $service)
    {
        if ($request->ajax()) {
            $dataTable = $service->getDataTable();
            return DataTables::of($dataTable)
                ->addIndexColumn()
                ->editColumn('label', function ($row) {
                        return $row->{'label:en'} ;
                })
                ->editColumn('value', function ($row) {
                    return $row->{'value:en'} ;
                })
                ->addColumn('product_name', function ($row) {
                    return $row->product->{'title:en'} ?? '--';
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
        $data["bladeTitle"] = __('zemovit.products-details');
        $data["addButtonText"] = __('zemovit.products-details');
        return view($this->folderPath . '.index', $data);
    }

    public function create(Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
                'products'=> Product::all(),
                // Pass additional data if needed
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function store(objRequest $request, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->store($dataInsert);
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

    public function edit(int $id, Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".edit")->with([
                'updateRoute' => route($this->mainRoute . ".update", $id),
                "obj" => $service->find($id),
                'products'=> Product::all(),

            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function update(objRequest $request, int $id, objService $service)
    {
        $dataInsert = $request->validated();
        $data = $service->update($id, $dataInsert);
        return jsonSuccess($data);
    }

    public function destroy(int $id, objService $service)
    {
        $service->delete($id);
        return jsonSuccess();
    }
}
