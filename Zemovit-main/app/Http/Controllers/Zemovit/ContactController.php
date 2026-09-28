<?php

namespace App\Http\Controllers\Zemovit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Services\Zemovit\ContactService as objService;
use App\Http\Requests\Zemovit\ContactRequest as objRequest;

class ContactController extends Controller
{
    public string $folderPath = "zemovit.contacts";
    public string $mainRoute = "contacts";
    public function index(Request $request, objService $service)
    {
        if ($request->ajax()) {
            $dataTable = $service->getDataTable();
            return DataTables::of($dataTable)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    $editButton = '';
                    $deleteButton = '';
                    $deleteButton = deleteButton(route($this->mainRoute . ".destroy", $row->id));
                    return    $deleteButton;
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

    public function create(Request $request, objService $service)
    {
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
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
