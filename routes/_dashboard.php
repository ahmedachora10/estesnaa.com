<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeaturedServiceController;
use App\Http\Controllers\Admin\InventionController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Models\Category;
use App\Models\Event;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::get('/assing_role', function ()
{
    $user = User::find(auth()->id());
    // $user->attachRole('admin');

    return auth()->user();
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function ()
{


    Route::controller(SettingController::class)
    ->prefix('settings')->name('settings.')
    ->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::get('/dashboard', function () {
        $users = collect(User::with('roles')->get());
        $admins_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'admin')->first();
        })->count();

        $employees_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'employee')->first();
        })->count();

        $inventors_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'inventor')->first();
        })->count();

        $service_providers_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'service_provider')->first();
        })->count();

        $events_count = $users->filter(function ($item)
        {
            return $item->roles->where('name', 'event')->first();
        })->count();

        $events_count = Event::count();
        $categories_count = Category::count();
        $packages_count = 2; // Package::count()

        return view('admin.dashboard', compact(
            'admins_count', 'employees_count', 'inventors_count', 'events_count',
            'packages_count', 'categories_count', 'service_providers_count',
            'events_count'
    ));
    })->middleware('verified')->name('dashboard');

    /**
     * Category Routes
     */
    Route::resource('categories', CategoryController::class);

    /**
     * Package Routes
     */
    Route::resource('packages', PackageController::class);

    /**
     * Product Routes
     */
    Route::resource('products', ProductController::class);

    /**
     * User Routes
     */
    // Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('users.profile');

    Route::resource('users', UserController::class);

    /**
     * Role Routes
     */
    Route::resource('roles', RoleController::class);

    /**
     * Country Routes
     */
    Route::resource('countries', CountryController::class);

    /**
     * City Routes
     */
    Route::resource('cities', CityController::class);


    /**
     * Invention Routes
     */
    Route::resource('inventions', InventionController::class);

    /**
     * Service Routes
     */
    Route::resource('services', ServiceController::class);

    /**
     * Event Routes
     */
    Route::resource('events', EventController::class);

    /**
     * Slider Routes
     */
    Route::resource('sliders', SliderController::class);

    /**
     * Featured Service Routes
     */
    Route::resource('featuredservices', FeaturedServiceController::class);

});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });