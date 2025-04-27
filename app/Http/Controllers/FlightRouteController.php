<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Models\FlightRoute;
use App\Models\FlightPlan;

class FlightRouteController extends Controller
{
    public function index($id){

        $routes = FlightRoute::where('flight_plan_id', "=", $id)->get();

        $flightPlan = FlightPlan::find($id);

        return Inertia::render("flightroutes/Index", [
            'flightroutes' => $routes,
            'flightplan' => $flightPlan
        ]);

    }

    public function show($flight_route){

        $flightRoute = FlightRoute::find($flight_route);

        //dd($flightRoute);

        return Inertia::render("flightroutes/Show", [
            'flightroute' => $flightRoute
        ]);

    }

    public function update($flight_route){

        $flightRoute = FlightRoute::find($flight_route);
        
        dd($flight_route);

    }
}
