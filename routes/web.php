<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::view('/', 'frontend.home.index')->name('home');
Route::view('job', 'frontend.JobProMan.jobs')->name('jobs');
Route::view('freelancer', 'frontend.JobProMan.freelancers')->name('freelancers');
Route::view('contacts', 'frontend.home.contact')->name('contact');
Route::view('help', 'frontend.helpAbout.help')->name('help');
Route::view('about', 'frontend.helpAbout.about')->name('about');
Route::view('BReg', 'auth.BeforeReg')->name('BReg');
Route::view('project', 'frontend.JobProMan.project')->name('project');
Route::view('freelancers', 'backend.user.freelancer')->name('freelancer');

// Protected Routes (Requires Authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    
Route::view('myprofile', 'backend.profileManagement.freelancer')->name('myprofile');
    // Dashboard
    Route::view('/dashboard', 'backend.admin.dashboard')->name('dashboard');

    // Admin Routes (Only for User Management & Settings)
    Route::prefix('backend/admin')->name('admin.')->group(function () {

        // User Management (Only Admin)
        Route::middleware('can:isadmin')->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('users');
            Route::delete('/userDelete/{id}', [UserController::class, 'destroy'])->name('deleteUser');

            // User Edit & Update
            Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('useredit');
            Route::post('user/update/{id}', [UserController::class, 'update'])->name('updateUser');

            // Settings (Only Admin)
            Route::view('settings', 'backend.admin.settings')->name('settings');
        });

        // Projects (Accessible to All Authenticated Users)
        Route::view('projects', 'backend.admin.project.projects')->name('projects');
        Route::view('project/edit', 'backend.admin.project.edit')->name('projectedit');
    });

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});


require __DIR__.'/auth.php';
