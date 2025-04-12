<?php

use App\Http\Controllers\ClientJobController;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::view('/', 'frontend.home.index')->name('home');
Route::get('job', [ClientJobController::class, 'publicIndex'])->name('jobs.publicIndex');
Route::get('job/{job}', [ClientJobController::class, 'publicShow'])->name('jobs.publicShow');
Route::get('/freelancers', [FreelancerController::class, 'index'])->name('freelancers');
Route::view('contacts', 'frontend.home.contact')->name('contact');
Route::view('help', 'frontend.helpAbout.help')->name('help');
Route::view('about', 'frontend.helpAbout.about')->name('about');
Route::view('BReg', 'auth.BeforeReg')->name('BReg');


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

            // Admin job management
            Route::get('jobs', [ClientJobController::class, 'adminIndex'])->name('jobs.index');
            Route::delete('jobs/{job}', [ClientJobController::class, 'adminDestroy'])->name('jobs.destroy');
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

    // Freelancer Profile Routes
    Route::middleware('can:isfreelancer')->prefix('backend/freelancer/')->name('freelancer.jobs.')->group(function () {
        // Freelancer job proposals
        Route::get('jobs', [ClientJobController::class, 'freelancerIndex'])->name('index');
        Route::get('jobs/{job}', [ClientJobController::class, 'freelancerShow'])->name('show');
    });

    Route::middleware('can:isclient')->prefix('backend/client')->name('client.')->group(function () {
        Route::get('/profile', [ClientProfileController::class, 'index'])->name('profile');
        Route::get('/create', [ClientProfileController::class, 'create'])->name('create');
        Route::post('/store', [ClientProfileController::class, 'store'])->name('store');
        Route::get('/edit', [ClientProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ClientProfileController::class, 'update'])->name('update');
    });

    // Client job management
    Route::middleware('can:isclient')->prefix('backend/jobs')->name('jobs.')->controller(ClientJobController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{job}', 'show')->name('show');
        Route::get('/{job}/edit', 'edit')->name('edit');
        Route::put('/{job}', 'update')->name('update');
        Route::delete('/{job}', 'destroy')->name('destroy');
        Route::post('/{job}/complete', 'markAsCompleted')->name('complete');
        Route::get('/{job}/proposals', 'showProposals')->name('proposals');
    });
});

//------------------------ Common ----------------------//
Route::middleware('auth')->group(function(){
        
    Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals.index');
    Route::get('/proposals/{proposal}', [ProposalController::class, 'show'])->name('proposals.show');

});
// -------------------- Freelancer Routes -------------------- //
Route::middleware(['auth', 'role:freelancer'])->group(function () {
    Route::get('/proposals/create/{clientjob_id}', [ProposalController::class, 'create'])->name('proposals.create');
    Route::post('/proposals', [ProposalController::class, 'store'])->name('proposals.store');
    Route::get('/proposals/{proposal}/edit', [ProposalController::class, 'edit'])->name('proposals.edit');
    Route::put('/proposals/{proposal}', [ProposalController::class, 'update'])->name('proposals.update');
    Route::delete('/proposals/{proposal}', [ProposalController::class, 'destroy'])->name('proposals.destroy');
});

// -------------------- Client Routes -------------------- //
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::put('/proposals/{proposal}/update-status', [ProposalController::class, 'updateStatus'])->name('proposals.updateStatus');
    Route::post('/proposals/{proposal}/shortlist', [ProposalController::class, 'shortlist'])->name('proposals.shortlist');
    // Route::get('/proposals', [ProposalController::class, 'shortlisted'])->name('proposals.shortlisted'); this route was making problems
    Route::post('/proposals/{proposal}/message', [ProposalController::class, 'messageFreelancer'])->name('proposals.messageFreelancer');
});

// -------------------- Admin Routes -------------------- //
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/proposals', [ProposalController::class, 'adminIndex'])->name('admin.proposals.index');
    Route::post('/admin/proposals/{proposal}/admin-status', [ProposalController::class, 'adminUpdateStatus'])->name('admin.proposals.updateStatus');
});


require __DIR__ . '/auth.php';
