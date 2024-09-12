<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Test');
});

Route::get('/question', function () {
    return Inertia::render('Question');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

  Route::get('/test', function () {
       return Inertia::render('Test');
   });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('goodanswer', [QuestionController::class, 'verify'])->name('quiz.verify');

});

Route::get('/questions_mode2', [QuestionController::class, 'question_mode2']);
Route::get('/questions_mode1', [QuestionController::class, 'question_mode1']);

Route::get('/Mode2', function () {
    return Inertia::render('Mode2');
})->name('Mode2');

Route::get('/Mode1', function () {
    return Inertia::render('Mode1');
})->name('Mode1');

Route::get('/Modeliste', function () {
    return Inertia::render('Modeliste');
})->name('Modeliste');
require __DIR__.'/auth.php';
