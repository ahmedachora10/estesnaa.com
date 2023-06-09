<?php

namespace App\Http\Controllers\Auth;

use App\Casts\Status;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Package;
use App\Models\Role;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\NewUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = Country::active()->get();
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('auth.register', compact('countries', 'roles'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'phone' => ['required', 'unique:users,phone', 'integer'],
            // 'dob' => ['required', 'date'],
            'role_id' => ['required', 'integer', 'exists:roles,id'],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
            'country_code' => ['required', 'string', 'min:2', 'max:3'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'terms' => ['required']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            // 'dob' => $request->dob,
            'city' => $request->city,
            'country_id' => $request->country_id,
            'country_code' => $request->country_code,
            'status' => Status::PENDING->value
        ]);

        $user->attachRole($request->role_id);

        $user->update(['role' => $user->roles->first()->name]);

        if(in_array($user->role, ['service_provider', 'inventor']) && setting('free_service_package')) {
            $user->update(['service_provider_subscription_paid' => true]);
        }

        if($user->role == 'inventor' && setting('free_inventor_package')) {
            $package = Package::firstWhere([
                ['price', '=', 0],
                ['group', '=', 'inventor_profile'],
            ]);

            if($package) {
                Subscription::create([
                    'user_id' => $user->id,
                    'plan_id' => $package->id,
                    'amount' => $package->amount,
                    'start_date' => now(),
                    'status' => Status::ENABLED->value,
                    'end_date' => now()->addDays($package->duration)
                ]);
            }
        }

        if($user->role != 'user') {
            $user->profit()->create(['total' => 0]);
        }

        event(new Registered($user));

        Auth::login($user);

        Notification::send(User::whereRoleIs('admin')->get(),new NewUser([
            'title' => 'مستخدم جديد',
            'content' => 'تم تسجيل ' . $user->roles->first()->display_name . ' جديد.',
            'link' => route('users.index')
        ]));

        return redirect( $user->email_verified_at == null ? '/verify-email'  : RouteServiceProvider::HOME);
    }
}