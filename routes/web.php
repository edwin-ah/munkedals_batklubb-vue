<?php

use App\Http\Controllers\HolidayClosedController;
use App\Http\Controllers\InformationSheetController;
use App\Models\HolidayClosed;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', [HolidayClosedController::class, 'getHolidayClosed'])
    ->name('home');

Route::post('/', [HolidayClosedController::class, 'updateHolidayClosed'])
    ->middleware('auth');

Route::get('/hamnomraden', function() {
    return Inertia::render('PortAreas');
})->name('portAreas');

Route::get('/information', [InformationSheetController::class, 'index'])
    ->name('information.index');



// SCAFFOLDING
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
