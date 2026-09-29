<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;


Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/questions/create', [QuestionController::class, 'create'])
        ->name('admin.questions.create');

    Route::post('/questions', [QuestionController::class, 'store'])
        ->name('admin.questions.store');
});

require __DIR__.'/settings.php';
