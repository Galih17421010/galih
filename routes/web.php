<?php

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('user.list');

    Route::resource('projects', ProjectController::class);

    Route::resource('skills', SkillController::class);

    Route::resource('experiences', ExperienceController::class);

    Route::resource('educations', EducationController::class);
});

require __DIR__.'/auth.php';
