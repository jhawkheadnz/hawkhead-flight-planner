<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\FlightPlan;

class FlightPlanController extends Controller
{
    public function index(){

        $flightPlans = FlightPlan::all();

        return Inertia::render("flightplans/Index", [ 'flightplans' => $flightPlans ]);

    }
}
