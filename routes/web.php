<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::get('job', function () {
    return view('JobProMan.jobs');
})->name('jobs');

Route::get('freeanlancer', function () {
    return view('JobProMan.freelancers');
})->name('freelancers');

Route::get('contacts', function () {
    return view('home.contact');
})->name('contact');

Route::get('help', function () {
    return view('home.help');
})->name('help');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('Aclients', function () {
    return view('admin.client');
})->middleware(['auth', 'verified'])->name('Aclient');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
