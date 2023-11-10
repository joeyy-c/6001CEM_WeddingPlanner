<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\WeddingPlanningController;
use App\Http\Controllers\ProjectServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;


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

Route::get('/about-us', function () {
    return view('about_us');
})->name('about-us');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/contact-us', function () {
    return view('contact_us');
})->name('contact-us');

// Route::post('/contact-us', function () {
//     return view('contact_us');
// })->name('contact-us');
// Route::post('/contact-us', [MailController::class, 'send_email'])->name('contact-us.send-email');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Dashboard
Route::get('/dashboard', [ProjectController::class, 'userDashboard'])->middleware(['auth', 'verified', 'checkUserRole'])->name('dashboard');
Route::get('/vendor/dashboard', [DashboardController::class, 'vendorDashboard'])->middleware(['auth', 'verified', 'checkVendorRole'])->name('vendor.dashboard');
Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->middleware(['auth', 'verified', 'checkAdminRole'])->name('admin.dashboard');


// Vendor - Project
Route::get('/vendor/projects', [ProjectServiceController::class, 'index'])->middleware(['checkVendorRole'])->name('vendor.projects.index');
Route::get('/vendor/projects/{project_service}/edit', [ProjectServiceController::class, 'edit'])->middleware(['checkVendorRole'])->name('vendor.projects.edit');
Route::patch('/vendor/project/{project_service}', [ProjectServiceController::class, 'update'])->middleware(['checkVendorRole'])->name('vendor.projects.update'); 

// Admin - Project
Route::get('/admin/projects', [ProjectController::class, 'index'])->middleware(['checkAdminRole'])->name('admin.projects.index');
// Route::get('/admin/project/{project}/edit', [ProjectServiceController::class, 'edit'])->name('admin.projects.edit');
Route::get('/admin/projects/{project}', [ProjectController::class, 'show'])->middleware(['checkAdminRole'])->name('admin.projects.show');
Route::patch('/admin/project/{project}', [ProjectServiceController::class, 'update'])->middleware(['checkAdminRole'])->name('admin.projects.update'); 


// Vendor - Services
Route::get('/vendor/services', [ServiceController::class, 'index'])->middleware(['checkVendorRole'])->name('vendor.services.index');
Route::get('/vendor/services/create', [ServiceController::class, 'create'])->middleware(['checkVendorRole'])->name('vendor.services.create');
Route::post('/vendor/services', [ServiceController::class, 'store'])->middleware(['checkVendorRole'])->name('vendor.services.store');
// Route::get('/vendor/services/{service}', [ServiceController::class, 'show'])->name('vendor.services.show');
Route::post('/vendor/services/disableService', [ServiceController::class, 'disableService'])->middleware(['checkVendorRole'])->name('vendor.services.disableService'); // update multiple record in service listing
Route::get('/vendor/services/{service}/edit', [ServiceController::class, 'edit'])->middleware(['checkVendorRole'])->name('vendor.services.edit');
Route::patch('/vendor/services/{service}', [ServiceController::class, 'update'])->middleware(['checkVendorRole'])->name('vendor.services.update'); 

// Admin - Services
Route::get('/admin/services', [ServiceController::class, 'index'])->middleware(['checkAdminRole'])->name('admin.services.index');
Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->middleware(['checkAdminRole'])->name('admin.services.edit');


// Vendors
Route::get('/admin/vendors', [UserController::class, 'indexVendor'])->middleware(['checkAdminRole'])->name('vendors.index');
Route::get('/admin/vendors/{vendor}/edit', [UserController::class, 'updateVendor'])->middleware(['checkAdminRole'])->name('vendors.edit');

// Users
Route::get('/admin/users', [UserController::class, 'indexUser'])->middleware(['checkAdminRole'])->name('users.index');
Route::get('/admin/users/{user}', [UserController::class, 'show'])->middleware(['checkAdminRole'])->name('users.show');

// Admin
// Route::get('/admin/admins', [UserController::class, 'indexAdmin'])->name('admins.index');
// Route::get('/admin/admins/create', [UserController::class, 'create'])->name('admins.create');
// Route::get('/admin/admins/{admin}', [UserController::class, 'show'])->name('admins.show');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('userProfile.edit');
    Route::get('/vendor/profile', [ProfileController::class, 'edit'])->middleware(['checkVendorRole'])->name('vendorProfile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Wedding Planning (Site)
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

Route::get('/test', function() {
    return view('test');
});

Route::get('/test2', function() {
    return view('test2');
});