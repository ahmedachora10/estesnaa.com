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

Route::controller(PaymentController::class)->name('pay.')->middleware('auth')
->prefix('pay')->group(function ()
{
    Route::get('/success', 'success')->name('success');
    Route::get('/cancel', 'cancel')->name('cancel');
    Route::get('/{package}', 'pay')->name('send');
});


require __DIR__.'/auth.php';
require __DIR__.'/_dashboard.php';