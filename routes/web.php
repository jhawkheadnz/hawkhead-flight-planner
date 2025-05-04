<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistGroupController;
use App\Http\Controllers\ChecklistItemController;

use App\Http\Controllers\FlightPlanController;
use App\Http\Controllers\FlightRouteController;

Route::get('/', function () { return Inertia::render('Welcome'); })->name('home');

Route::get('dashboard', function () { return Inertia::render('Dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');
// Test
Route::get('flightroutes/view2', function () { return Inertia::render('flightroutes/View2'); })->middleware(['auth', 'verified'])->name('flightroutes.view');

// Checklist Routes
Route::get('checklists', [ChecklistGroupController::class, "index"])->middleware(['auth','verified'])->name("checklist_groups");
Route::get('checklists/view/{tag_name}', [ChecklistGroupController::class, "show"])->middleware(['auth', 'verified'])->name("checklists");
Route::get('checklists/view/{tag_name}/{checklist}', [ChecklistItemController::class, "show"])->middleware(['auth', 'verified'])->name("checklist");

// Flight Planning Routes
Route::get('flightplans', [FlightPlanController::class, "index"])->middleware(['auth', 'verified'])->name("flightplans"); // display all flight plans
Route::get('flightplans/create', [FlightPlanController::class, "create"])->middleware(['auth', 'verified'])->name("flightplan.create");
Route::get('flightplans/{flightplan_id}/edit', [FlightPlanController::class, "edit"])->middleware(['auth'], ['verified'])->name("flightplan.edit");
Route::put('flightplans/{id}/update', [FlightPlanController::class, "update"])->middleware(['auth'], ['verified'])->name("flightplan.update");
Route::post('flightplans/create', [FlightPlanController::class, "store"])->middleware(['auth', 'verified'])->name("flightplan.store");
Route::delete('flightplans/{id}', [FlightPlanController::class, "destroy"])->middleware(['auth', 'verified'])->name("flightplan.destroy");


// Flight Route
Route::get('flightplans/routes/{flightplan}/create', [FlightRouteController::class, "create"])->middleware(['auth', 'verified'])->name("flightroute.create");
Route::get('flightplans/routes/{id}', [FlightRouteController::class, "index"])->middleware(['auth', 'verified'])->name("flightplan.routes");
Route::get('flightroute/{flight_route}', [FlightRouteController::class, "edit"])->middleware(['auth', 'verified'])->name("flight_route");
Route::put('flightroute', [FlightRouteController::class, "update"])->middleware(['auth', 'verified'])->name("flightroute.confirm");
Route::post('flightroute/create', [FlightRouteController::class, "store"])->middleware(['auth', 'verified'])->name("flightroute.store");
Route::delete('flightroute/{id}', [FlightRouteController::class, "destroy"])->middleware(['auth', 'verified'])->name("flightroute.destroy");


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
