<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ChatController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceStageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(HomeController::class)->group(function ()
{
    Route::get('/', 'index')->name('home');
    Route::get('/inventors/deceased', 'deceasedInventors')->name('front.inventors.deceased');
    Route::get('/inventions', 'inventions')->name('front.inventions.index');
    Route::get('/inventions/{invention}', 'showInvention')->name('front.inventions.show');
    Route::get('/inventors', 'inventors')->name('front.inventors.index');
    Route::get('/inventors/decesead/{inventor}', 'showDeceasedInventor')->name('front.inventors.deceased.show');
    Route::get('/inventors/{inventor}', 'showInventor')->name('front.inventors.show');

    // Packages
    Route::get('/packages', 'packages')->middleware(['auth', 'role:event|inventor|service_provider'])
    ->name('front.packages');

    Route::get('/service_providers/plan', 'serviceProviderPlan')->middleware(['auth', 'role:service_provider'])
    ->name('front.service-provider.plan');

    Route::get('/inventor_profile/plan', 'inventorProfilePlan')->middleware(['auth', 'role:inventor'])
    ->name('front.inventor.profile.plan');

    // Pages
    Route::get('pages/{page:title}', 'showPage')->name('front.pages.show');
});

Route::controller(ServiceController::class)->name('front.services.')
->prefix('services')->group(function ()
{
    Route::get('/', 'index')->name('index');
    Route::get('/all/{category}', 'services')->name('all');
    Route::get('/{service}', 'show')->name('show');
});

Route::controller(EventController::class)->group(function ()
{
    Route::get('events', 'index')->name('front.events.index');
    Route::get('events/{event}', 'show')->name('front.events.show');
});

Route::controller(PaymentController::class)->name('payment.')->middleware(['auth', 'role:user|service_provider|event|inventor'])
->prefix('pay')->group(function ()
{
    Route::get('/success', 'success')->name('success');
    Route::get('/cancel', 'cancel')->name('cancel');
    Route::get('/invention/{invention}', 'inventionOrderPayment')->name('invention.order');
    Route::get('/service/{service}', 'serviceOrderPayment')->name('service.order');
    Route::get('direct', 'direct')->name('direct');
    Route::get('/{package}', 'pay')->name('pay');
});

Route::controller(ServiceStageController::class)
->prefix('user/services/stages')->name('front.services.stage.')
->middleware('auth')->group(function ()
{
    Route::get('change/{service_stage}/{stage}', 'changeStage')->name('change');
    Route::get('{service_stage}', 'index')->name('index');
});

Route::controller(UserController::class)->prefix('user')
->name('front.user.')->middleware('auth')->group(function ()
{
    Route::get('purchase', 'purchase')->name('purchase');
    Route::post('rating/store', 'ratingServiceStore')->name('rating.store');
});

Route::controller(ChatController::class)
->prefix('chat')->name('chat.')->middleware(['auth'])
->group(function ()
{
    Route::get('/new/{service_provider}/{service}', 'newChat')->name('new');
    Route::get('/{chat}', 'chat')->name('index');
});


require __DIR__.'/auth.php';
require __DIR__.'/_dashboard.php';