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

    public function show(){

        

    }

    public function create(){

        return Inertia::render("flightplans/Create");

    }

    public function store(Request $request){

        FlightPlan::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return to_route("flightplans");

    }

    public function update(Request $request){

        $flightPlan = FlightPlan::find($request->id);
        $flightPlan->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

    }

    public function destroy(Request $request){

        FlightPlan::deleteOrThrow($request->id);

        return to_route("flightplans");

    }

}
