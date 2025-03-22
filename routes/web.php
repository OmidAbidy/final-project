

<?php

use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::view('/', 'frontend.home.index')->name('home');
Route::view('job', 'frontend.JobProMan.jobs')->name('jobs');
Route::view('freelancers', 'frontend.JobProMan.freelancers')->name('freelancers');
Route::view('contacts', 'frontend.home.contact')->name('contact');
Route::view('help', 'frontend.helpAbout.help')->name('help');
Route::view('about', 'frontend.helpAbout.about')->name('about');
Route::view('BReg', 'auth.BeforeReg')->name('BReg');
Route::view('project', 'frontend.JobProMan.project')->name('project');

// Backend Freelancer Management (Changed route name)

// Protected Routes (Requires Authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Freelancer Profile Management
    

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
            
            // Projects (Accessible to All Authenticated Users)
            Route::view('projects', 'backend.admin.project.projects')->name('projects');
            Route::view('project/edit', 'backend.admin.project.edit')->name('projectedit');
        });

    });

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Freelancer Profile Routes
    Route::middleware('can:isfreelancer')->prefix('backend/freelancer')->name('freelancer.')->group(function () {
        

        Route::get('/profile', [FreelancerProfileController::class, 'index'])->name('profile');
        Route::get('/create', [FreelancerProfileController::class, 'create'])->name('create');
        Route::post('/store', [FreelancerProfileController::class, 'store'])->name('store');
        Route::get('/edit', [FreelancerProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [FreelancerProfileController::class, 'update'])->name('update');
        
    });
    

    Route::middleware('can:isclient')->prefix('backend/client')->name('client.')->group(function () {
        
        Route::get('/profile', [ClientProfileController::class, 'index'])->name('profile');
        Route::get('/create', [ClientProfileController::class, 'create'])->name('create');
        Route::post('/store', [ClientProfileController::class, 'store'])->name('store');
        Route::get('/edit', [ClientProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ClientProfileController::class, 'update'])->name('update');
        
    });
    

});

require __DIR__.'/auth.php';



