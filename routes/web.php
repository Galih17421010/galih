<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CategorieTagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ResumeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class);

Route::resource('project', \App\Http\Controllers\Frontend\ProjectController::class);

Route::resource('experience', \App\Http\Controllers\Frontend\ExperienceController::class );

Route::resource('resume', ResumeController::class);

Route::resource('contact', ContactController::class);

Route::resource('blog', BlogController::class);

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

    Route::resource('categorietag', CategorieTagController::class);

    Route::resource('articles', ArticleController::class);

    Route::resource('categories', CategorieController::class);

    Route::resource('tags', TagController::class);

    Route::resource('articles', ArticleController::class);
});

require __DIR__.'/auth.php';
