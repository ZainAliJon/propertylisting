<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return redirect(url('/'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Locations
        Route::get('/locations', [\App\Http\Controllers\LocationController::class, 'index'])->name('location.index');
        Route::get('/location/create',  [App\Http\Controllers\LocationController::class, 'create'])->name('location');
        Route::get('/location/edit/{id}',  [App\Http\Controllers\LocationController::class, 'edit'])->name('location');
        Route::post('/location/edit/{id}',  [App\Http\Controllers\LocationController::class, 'update'])->name('location');
        Route::post('/location/store', [\App\Http\Controllers\LocationController::class, 'store'])->name('location.store'); 
        Route::get('/location/delete/{id}', [\App\Http\Controllers\LocationController::class, 'destroy']);
        // Buildings
        Route::get('/buildings', [\App\Http\Controllers\BuildingController::class, 'index'])->name('building.index');
        Route::get('/building/create', [\App\Http\Controllers\BuildingController::class, 'create'])->name('building.create');
        Route::get('/building/edit/{id}', [\App\Http\Controllers\BuildingController::class, 'edit'])->name('building.edit');
        Route::post('/building/edit/{id}', [\App\Http\Controllers\BuildingController::class, 'update'])->name('building.update');
        Route::post('/building/store', [\App\Http\Controllers\BuildingController::class, 'store'])->name('building.store');
        Route::get('/building/delete/{id}', [\App\Http\Controllers\BuildingController::class, 'destroy']);
        // listings
        Route::get('/listings', [\App\Http\Controllers\ListingController::class, 'index'])->name('listing.index');
        Route::get('/listings/pdf', [\App\Http\Controllers\ListingController::class, 'pdf'])->name('listing.pdf');
        Route::get('/listing/create', [\App\Http\Controllers\ListingController::class, 'create'])->name('listing.create');
        Route::get('/listing/edit/{id}', [\App\Http\Controllers\ListingController::class, 'edit'])->name('listing.edit');
        Route::post('/listing/edit/{id}', [\App\Http\Controllers\ListingController::class, 'update'])->name('listing.update');
        Route::post('/listing/store', [\App\Http\Controllers\ListingController::class, 'store'])->name('listing.store');
        Route::get('/listing/delete/{id}', [\App\Http\Controllers\ListingController::class, 'destroy']);
        Route::post('/listing/pdf_downlaod', [\App\Http\Controllers\ListingController::class, 'downlaod_pdf']);
});

require __DIR__.'/auth.php';
