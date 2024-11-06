<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('client', function () {
    return view('user.client');
});

Route::get('freelancer', function () {
    return view('user.freelancer');
});


Route::get('Category',[CategoryController::class, 'index'])->name('category');
Route::get('Contact',[ContactController::class, 'index'])->name('contact');




Route::get('Freelancers', [FreelancerController::class, 'index'])->name('freelancers');




Route::get('job', [JobController::class, 'index'])->name('jobs');


Route::get('login',function(){
    return view('auth.login');
})->name('login');

Route::get('register',function(){
    return view('auth.register');
})->name('register');