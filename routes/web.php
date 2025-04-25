<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistGroupController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    
    return Inertia::render('Dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('checklists', [ChecklistGroupController::class, "index"])->middleware(['auth','verified'])->name("checklists");

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
