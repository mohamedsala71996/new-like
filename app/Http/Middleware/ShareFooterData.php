<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;

class ShareFooterData
{
    public function handle($request, Closure $next)
    {
        $settings = Setting::first();
        view()->share('footerData', $settings);
        return $next($request);
    }
}