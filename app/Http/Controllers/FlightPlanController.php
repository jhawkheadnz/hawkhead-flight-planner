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

    public function edit($flightplan_id){

        $flightPlan = FlightPlan::find($flightplan_id);

        return Inertia::render("flightplans/Edit", ['flightplan' => $flightPlan]);

    }

    public function store(Request $request){

        FlightPlan::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return to_route("flightplans");

    }

    public function update($flightplan){

        $flightPlan = FlightPlan::find($flightplan);

        //dd($flightPlan);

        dd($flightplan);

        $flightPlan->update([
            'name' => $flightplan->name,
            'description' => $flightplan->description
        ]);

        return to_route("flightplans");

    }

    public function destroy(Request $request){

        FlightPlan::destroy($request->id);

        return to_route("flightplans");

    }

}
