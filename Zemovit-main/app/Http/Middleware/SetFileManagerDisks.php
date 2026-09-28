<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Enums\AdminTypeisEnum;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class SetFileManagerDisks
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            if (Auth::guard('admin')->user()->admin_type == AdminTypeisEnum::Developer->value) {
                Config::set('file-manager.diskList', ['public', 'assets']);
                Artisan::call('optimize:clear');
                Log::info('Developer access: assets and public disks set.');
            } else {
                Config::set('file-manager.diskList', ['public']);
                Artisan::call('optimize:clear');
                Log::info('Non-developer access: public disk set.');
            }
        } else {
            Log::warning('No admin user authenticated.');
        }

        return $next($request);
    }
}
