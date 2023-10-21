<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\WeddingPlanningController;
use App\Http\Controllers\ProjectServiceController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ProjectServiceController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/vendor/dashboard', function () {
    return view('vendor.dashboard');
})->middleware(['auth', 'verified'])->name('vendor.dashboard');

// Route::get('/vendor/services/add', function () {
//     return view('vendor.services.add');
// })->middleware(['auth', 'verified'])->name('vendor.services.add');

Route::get('/vendor/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/vendor/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/vendor/services', [ServiceController::class, 'store'])->name('services.store');
// Route::post('/vendor/services/create', [ServiceController::class, 'store'])->name('services.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contact-us');


// Route::get('/wedding-planning', function () {
//     return view('wedding_planning');
// })->name('wedding-planning');
Route::get('/wedding-planning/preferences', [WeddingPlanningController::class, 'createPreferencesForm'])->name('wedding-planning.createPreferencesForm');
Route::post('/wedding-planning/budget', [WeddingPlanningController::class, 'getMinBudget'])->name('wedding-planning.getMinBudget');
Route::post('/wedding-planning/recommendation-result', [WeddingPlanningController::class, 'getRecommendations'])->name('wedding-planning.getRecommendations');
// Route::get('/recommendation-result', [WeddingPlanningController::class, 'create'])->name('recommendation-result.create');
// Route::post('/recommendation-result/confirm', [WeddingPlanningController::class, 'store'])->name('recommendation-result.store'); //NEWW
Route::post('/projects', [ProjectController::class, 'store'])->middleware(['auth', 'verified'])->name('projects.store');

// Route::get('/recommendation-result', function () {
//     return view('recommendation_result');
// })->name('recommendation-result');

// Route::get('/test', function() {
//     return view('auth.login');
// });