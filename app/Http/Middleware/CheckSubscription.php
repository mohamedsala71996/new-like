<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Subscription;
use Toastr;

class CheckSubscription
{
    public function handle($request, Closure $next)
    {
        $subscription = Subscription::where('customer_id', auth('customer')->id())
            ->where('status', 'active')
            ->first();

        if (!$subscription) {
            toastr()->error('برجاء الاشتراك أو انتظار تفعيل الاشتراك في حالة اشتراكك');
            return redirect()->back();
        }

        return $next($request);
    }
}
