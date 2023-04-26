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
        if(auth()->check() && auth()->user()->role != 'admin') {

            if(auth()->user()->role == 'service_provider' && auth()->user()->service_provider_subscription_paid == false) {
                return redirect()->route('front.service-provider.plan');
            } elseif(in_array(auth()->user()->role, ['event', 'inventor']) && !auth()->user()->plan) {
                return redirect()->route('front.packages');
            }
        }

        return $next($request);
    }
}