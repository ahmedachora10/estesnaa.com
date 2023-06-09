<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeadInventorController;
use App\Http\Controllers\Admin\FeaturedServiceController;
use App\Http\Controllers\Admin\InventionController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UserWithdrawalRequestController;
use App\Http\Controllers\SortController;
use App\Models\Category;
use App\Models\Event;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Clue\StreamFilter\fun;

Route::get('/assing_role', function ()
{
    $user = User::find(auth()->id());
    // $user->attachRole('admin');

    return auth()->user();
});

// 'verified'
Route::middleware(['auth', 'verified'])->prefix('admin')->group(function ()
{

    Route::middleware('role:admin')->group(function ()
    {

        Route::post('/records/sort', [SortController::class, 'sort'])->name('sort');

        Route::controller(SettingController::class)
        ->prefix('settings')->name('settings.')
        ->group(function ()
        {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });

        /**
         * Category Routes
         */
        Route::resource('categories', CategoryController::class);

        /**
         * Package Routes
         */
        Route::resource('packages', PackageController::class);

        /**
         * Package Routes
         */
        Route::resource('subscriptions', SubscriptionController::class)->only(['index']);

        /**
         * Users Routes
         */
        Route::resource('users', UserController::class)->only('index', 'create', 'store','delete', 'edit', 'destroy');

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
         * Slider Routes
         */
        Route::resource('sliders', SliderController::class);

        /**
         * Slider Routes
         */
        Route::resource('pages', PageController::class);

        /**
         * Featured Service Routes
         */
        Route::resource('featuredservices', FeaturedServiceController::class);

        /**
         * User Withdrawal Requst Routes
         */
        Route::resource('withdrawal_requests', UserWithdrawalRequestController::class);

        /**
         * Deceased Inventors
         */
        Route::resource('inventors/deceased', DeadInventorController::class);
    });

    Route::middleware('role:admin|event|inventor')->group(function ()
    {
        /**
         * Event Routes
         */
        Route::resource('events', EventController::class);
    });

    Route::middleware('role:admin|inventor')->group(function ()
    {
        /**
         * Invention Routes
         */
        Route::resource('inventions', InventionController::class);
    });

    Route::middleware('role:admin|service_provider|inventor')->group(function ()
    {
        /**
         * Service Routes
         */
        Route::get('services/restore', [ServiceController::class, 'restore'])->name('services.restore');
        Route::resource('services', ServiceController::class);
    });

    Route::controller(DashboardController::class)
    ->prefix('/dashboard')->middleware('role:admin|service_provider|event|inventor')
    ->group(function ()
    {
        Route::get('/', 'index')->name('dashboard');
        Route::post('/inventors/profile', [UserController::class, 'updateInventorProfile'])->name('inventors.profile');
        Route::post('users/inventors/video/upload', [UserController::class, 'uploadVideo'])->name('users.upload.video');
        Route::resource('users', UserController::class)->only('show', 'update');
        Route::get('user/notifications', function ()
        {
            return view('admin.notifications');
        })->name('users.notifications');
    });

    /**
     * User Routes
     */
    Route::post('/user/profile', [UserController::class, 'updateProfile'])->name('users.profile');


});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
