<?php

namespace App\Http\Middleware;

use App\Casts\Status;
use Closure;
use Illuminate\Http\Request;

class UserActive
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
        if(auth()->check() && auth()->user()->email_verified_at != null && auth()->user()->status->value != Status::ENABLED->value && auth()->user()->role != 'admin') {
            auth()->logout();
            return redirect()->route('active.user');
        }

        return $next($request);
    }
}