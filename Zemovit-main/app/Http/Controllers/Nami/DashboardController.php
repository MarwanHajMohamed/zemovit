<?php

namespace App\Http\Controllers\Nami;

use App\Http\Controllers\Controller;
use App\Models\Zemovit\About;
use App\Models\Zemovit\Banner;
use App\Models\Zemovit\Contact;
use App\Models\Zemovit\Faq;
use App\Models\Zemovit\Product;
use App\Models\Zemovit\WhyChooseUs;
use App\Services\Zemovit\PageViewService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Services\Nami\HomeDashboardService as objService;

class DashboardController extends Controller
{
    public function __construct(private PageViewService $pageViewService)
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function index(objService $service)
    {
        $data  ['products'] =  Product::count();
        $data['why_choose_us'] = WhyChooseUs::count();
        $data['contacts'] = Contact::count();
        $data['abouts'] = About::count();
        $data['banners'] = Banner::count();
        $data['page_view_chart'] = $this->pageViewService->pageViewChart();
        $data['page_view_chart_pages'] = $this->pageViewService->pageViewChartPages();
        return view('nami.dashboard',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
