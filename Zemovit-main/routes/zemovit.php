<?php


use App\Http\Controllers\Zemovit\AboutController;
use App\Http\Controllers\Zemovit\ArrangementController;
use App\Http\Controllers\Zemovit\BannerController;
use App\Http\Controllers\Zemovit\BlockController;
use App\Http\Controllers\Zemovit\BlockImageController;
use App\Http\Controllers\Zemovit\BlogController;
use App\Http\Controllers\Zemovit\BlogImageController;
use App\Http\Controllers\Zemovit\ContactController;
use App\Http\Controllers\Zemovit\FaqController;
use App\Http\Controllers\Zemovit\HomeSettingController;
use App\Http\Controllers\Zemovit\MissionController;
use App\Http\Controllers\Zemovit\PageNameController;
use App\Http\Controllers\Zemovit\ProductBenefitController;
use App\Http\Controllers\Zemovit\ProductController;
use App\Http\Controllers\Zemovit\ProductDetailController;
use App\Http\Controllers\Zemovit\SeoSettingController;
use App\Http\Controllers\Zemovit\TherapeuticAreaController;
use App\Http\Controllers\Zemovit\VissionController;
use App\Http\Controllers\Zemovit\WhyChooseUsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ["adminLocale", 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    //--------------------------------------------------------
    Route::group(['prefix' => "dashboard"], function () {
        Route::group(["middleware" => ["admin", "preventBack", 'checkPermission']], function () {
            Route::resource('banners', BannerController::class);
            Route::resource('faqs', FaqController::class);

            Route::resource('abouts', AboutController::class);
            Route::resource('missions', MissionController::class);
            Route::resource('visions', VissionController::class);
            Route::resource('blogs', BlogController::class);
            Route::resource('blogs-images', BlogImageController::class);
             
            Route::resource('contacts', ContactController::class);
            Route::resource('products', ProductController::class);
            Route::resource('products-benefits', ProductBenefitController::class);
            Route::resource('products-details', ProductDetailController::class);
            Route::resource('therapeutic_areas', TherapeuticAreaController::class);
            Route::resource('why-choose-us',WhyChooseUsController::class);
            Route::resource('page-names', PageNameController::class);
            Route::resource('seo-settings', SeoSettingController::class);
            Route::resource('home-settings', HomeSettingController::class);
            Route::resource('page-names', PageNameController::class);
            Route::resource('arrangements',ArrangementController::class);

        });

    });
});
