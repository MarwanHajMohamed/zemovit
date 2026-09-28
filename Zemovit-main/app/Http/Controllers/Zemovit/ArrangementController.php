<?php

namespace App\Http\Controllers\Zemovit;

use App\Enums\SectionNamesEnum;
use App\Http\Controllers\Controller;
use App\Models\Zemovit\HomeSetting;
use App\Services\Zemovit\HomeSettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArrangementController extends Controller
{
    public string $folderPath = "zemovit.arrangements";
    public string $mainRoute = "arrangements";

    public function index(Request $request)
    {
        $arr = [
            'home_settings' => HomeSetting::class,
        ];
        if (!array_key_exists($request->table, $arr)) {
            abort(404, 'Table not found');
        }
        $model = $arr[$request->table];
        $data = $model::query()->orderBy('position', 'asc')
            ->whereIn('section_name',[
                SectionNamesEnum::Banner,
                SectionNamesEnum::WhyChooseUs,
            ])
            ->get();
        if ($request->ajax()) {
            $returnHTML = view($this->folderPath . ".create", [
                'storeRoute' => route($this->mainRoute . ".store"),
                'data' => $data,
                'column' => $request->column,
                'table' => $request->table,
            ])->render();
            return jsonSuccess(["html" => $returnHTML]);
        }
    }

    public function store(Request $request, HomeSettingService $homeSettingService)
    {
        $positions = $request->input('position');
        $i = 1;
        foreach ($positions as $serviceId => $position) {
            $service = DB::table($request->table)->where('id', $serviceId)->update(['position' => $i++]);
        }
        $sections = $homeSettingService->getSectionsByPosition();
        $html = view($this->folderPath . ".render", compact('sections'))->render();
        return jsonSuccess(['html' => $html], null, 201);
    }
}
