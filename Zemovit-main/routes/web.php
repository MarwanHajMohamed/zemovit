<?php

use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\TherapeuticAreaController;
use App\Http\Controllers\Zemovit\PageViewController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/zemovit-pdf', function () {
    $path = public_path('pdfs/zemovit.pdf'); // مسار الملف داخل public

    if (!file_exists($path)) {
        abort(404, 'File not found.');
    }

    return response()->file($path); // يعرض الملف في المتصفح
});

Route::get('/', function () {
    return redirect()->secure(LaravelLocalization::getLocalizedURL('en', '/'));
});
Route::group(
    [
        'prefix' => 'en',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
 Route::get('/home', [HomeController::class, 'index'])->name('home1');
  // Route::get('/', function(){
  //   return view('welcome');
  // })->name('home');
 Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/therapeutic', [TherapeuticAreaController::class, 'index'])->name('therapeutic');//
Route::get('/about', [AboutController::class, 'index'])->name('about');//therapeutic-area
Route::get('/products', [ProductController::class, 'index'])->name('site.products');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('site.products.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.details');


Route::resource('page-view', PageViewController::class);

});

