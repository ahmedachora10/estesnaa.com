<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasPlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role != 'admin' && !auth()->user()->plan) {
            if(auth()->user()->role == 'service_provider') {
                return redirect()->route('front.service-provider.plan');
            } else {
                return redirect()->route('front.packages');
            }
        }

        return $next($request);
    }
}