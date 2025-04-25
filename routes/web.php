<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistGroupController;
use App\Http\Controllers\ChecklistItemController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    
    return Inertia::render('Dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');


// Checklist Routes
Route::get('checklists', [ChecklistGroupController::class, "index"])->middleware(['auth','verified'])->name("checklist_groups");
Route::get('checklists/view/{tag_name}', [ChecklistGroupController::class, "show"])->middleware(['auth', 'verified'])->name("checklists");
Route::get('checklists/view/{tag_name}/{checklist}', [ChecklistItemController::class, "show"])->middleware(['auth', 'verified'])->name("checklist");

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
