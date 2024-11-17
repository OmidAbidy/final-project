<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

Route::get('/', function () {
    return view('frontend.home.index');
})->name('home');
Route::get('job', function () {
    return view('frontend.JobProMan.jobs');
})->name('jobs');

Route::get('freeanlancer', function () {
    return view('frontend.JobProMan.freelancers');
})->name('freelancers');

Route::get('contacts', function () {
    return view('frontend.home.contact');
})->name('contact');

Route::get('help', function () {
    return view('frontend.home.help');
})->name('help');

Route::get('/dashboard', function () {
    return view('backend.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('backend.admin.users', function(){return view('backend.admin.users');})->name('users');
    Route::get('backend.admin.projects', function(){return view('backend.admin.projects');})->name('projects');
    Route::get('backend.admin.settings', function(){return view('backend.admin.settings');})->name('settings');
});

require __DIR__.'/auth.php';
