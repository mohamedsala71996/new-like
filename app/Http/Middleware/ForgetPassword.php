<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForgetPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user =\App\Models\Customer::where('email','=' ,$request->get('email'))->first();
        if ($user && $user->change_password_code != $request->get('code')){
            abort(403, 'You cannot reached this page');
        }

        return $next($request);
    }
}
