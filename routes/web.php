<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


// Custom login routes
Route::get('/custom-login', [LoginController::class, 'showLoginForm'])->name('custom.login');
Route::post('/custom-login', [LoginController::class, 'login']);
Route::post('/custom-logout', [LoginController::class, 'logout'])->name('custom.logout');

// Custom register routes
Route::get('/custom-register', [RegisterController::class, 'showRegistrationForm'])->name('custom.register');
Route::post('/custom-register', [RegisterController::class, 'register']);

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');


// Show all books with filters
Route::get('/tousLivres', [BookController::class, 'index'])->name('tousLivres');
Route::get('/livre/{id}', [BookController::class, 'show'])->name('livre.show');
Route::get('/livre/{id}/reserver', [BookController::class, 'showReservationForm'])->name('livre.reserver');
Route::post('/reserver/{livre}', [BookController::class, 'reserver'])->name('reserver');

// Authentication Routes
Auth::routes();

// Group all routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    // Edit profile (name and photo)
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

    // Edit password
    Route::get('/user/edit-password', [UserController::class, 'editPassword'])->name('user.edit-password');
    Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update-password');

    // Admin Routes with Admin Middleware
    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/profiles', [AdminController::class, 'showProfiles'])->name('admin.profiles');
        Route::put('/admin/profiles/{id}/update-role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
        Route::get('/admin/profiles/{id}/view', [AdminController::class, 'viewProfile'])->name('admin.viewProfile');
        Route::delete('/admin/profiles/{id}/delete', [AdminController::class, 'destroy'])->name('admin.deleteUser');
        Route::get('/admin/reservations', [AdminController::class, 'showReservations'])->name('admin.reservations');
        Route::put('/admin/reservations/{id}/update-status', [AdminController::class, 'updateReservationStatus'])->name('admin.updateReservationStatus');
        
        // Admin profile and password updates
        Route::get('/admin/profile', [AdminController::class, 'viewAdminProfile'])->name('admin.profile');
        Route::get('/admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.edit-profile');
        Route::put('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.update-profile');
        Route::get('/admin/profile/edit-password', [AdminController::class, 'editPassword'])->name('admin.edit-password');
        Route::put('/admin/profile/update-password', [AdminController::class, 'updatePassword'])->name('admin.update-password');
    });
});

// Resource Routes for livres and categories
Route::resource('categories', CategorieController::class);
Route::resource('livres', LivreController::class);
