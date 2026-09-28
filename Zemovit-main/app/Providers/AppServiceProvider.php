<?php

namespace App\Providers;

use Alexusmai\LaravelFileManager\Services\ConfigService\ConfigRepository;
use App\Models\Nami\MainSetting;
use Illuminate\Support\ServiceProvider;
use App\Http\TestConfigRepository;
use App\Models\Nami\Setting;
use App\Models\Role;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(500);

        //Register custom migration paths
        $migrationsPath = database_path('migrations');
        $directories = glob($migrationsPath . '/*', GLOB_ONLYDIR);
        $paths = array_merge([$migrationsPath], $directories);

        $this->loadMigrationsFrom($paths);
         // تسجيل الإعدادات كـ Singleton
         $this->app->singleton('settings', function () {
            return Setting::with('translations')->first();
        });

        // تسجيل الإعدادات الرئيسية كـ Singleton
        $this->app->singleton('main_setting', function () {
            return MainSetting::with('translations')->first();
        });

         // تسجيل صلاحيات المستخدم كـ Singleton
        $this->app->singleton('user_permission_list', function () {
            if (Auth::guard('admin')->user() && Auth::guard('admin')->user()->roles->count() > 0) {
                return Auth::guard('admin')->user()->roles->first()->permissions->pluck('name')->toArray();
            }
            return [];
        });

        $this->app->bind(ConfigRepository::class,TestConfigRepository::class);

         // مشاركة البيانات مع جميع الـ Views
         View::composer('*', function ($view) {
            $view->with('settings', app('settings'));
            $view->with('main_setting', app('main_setting'));
            $view->with('user_permission_list', app('user_permission_list'));
        });
    }
}
