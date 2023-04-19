<?php

namespace App\Http\Controllers\Auth;

use App\Casts\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        dd($request->user()->status == Status::PENDING->value, $request->user()->status == Status::DISABLED->value, $request->user()->status);

        if($request->user()->status == Status::PENDING->value) {
            $request->user()->logout();
            return back()->with('warning', 'هدا الحساب قيد المراجعة.');
        }elseif($request->user()->status == Status::DISABLED->value) {
            $request->user()->logout();
            return back()->with('danger', 'هدا الحساب معطل .');
        }

        if(in_array($request->user()->role, ['inventor', 'service_provider'])) {
            if(!$request->user()->profit) {
                $request->user()->profit()->create(['total' => 0]);
            }
        }

        return redirect()->intended($request->user()->role == 'admin' ? RouteServiceProvider::DASHBOARD : RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}