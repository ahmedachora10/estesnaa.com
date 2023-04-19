<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ServiceController;
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
    Route::get('/inventions', 'inventions')->name('front.inventions.index');
    Route::get('/inventions/{invention}', 'showInvention')->name('front.inventions.show');
    Route::get('/inventors', 'inventors')->name('front.inventors.index');
    Route::get('/inventors/{inventor}', 'showInventor')->name('front.inventors.show');

    // Packages
    Route::get('/packages', 'packages')->middleware(['auth', 'role:event|inventor|service_provider'])
    ->name('front.packages');

    Route::get('/service_providers/plan', 'serviceProviderPlan')->middleware(['auth', 'role:service_provider'])
    ->name('front.service-provider.plan');

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
    Route::get('direct', 'direct')->name('direct');
    Route::get('/{package}', 'pay')->name('pay');
});


require __DIR__.'/auth.php';
require __DIR__.'/_dashboard.php';