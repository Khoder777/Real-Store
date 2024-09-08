<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BlockCustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('customers')->check()){
            if(Auth::guard('customers')->user()->status==0)
            {
                
                Auth::guard('customers')->logout();
                return redirect()->route('site.home');
            }
            return $next($request);
        }
        return $next($request);
    }
}
