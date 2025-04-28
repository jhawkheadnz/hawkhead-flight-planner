<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Models\FlightRoute;
use App\Models\FlightPlan;
use Illuminate\Validation\Rules;

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

    public function update(Request $request){

        $validation = $request->validate([
            'flight_route' => ['required'],
            'from' => ['required'],
            'to' => ['required'],
            'airspeed_cas' => ['required'],
            'temp_c' => ['required'],
            'altitude' => ['required'],
            'airspeed_tas' => ['required'],
            'track' => ['required'],
            'wind_true' => ['required'],
            'wind_speed' => ['required'],
            'heading_true' => ['required'],
            'variation' => ['required'],
            'heading_magnetic' => ['required'],
            'deviation' => ['required'],
            'heading_compass' => ['required'],
            'ground_speed' => ['required'],
            'distance' => ['required'],
            'time' => ['required'],
            'eta' => ['required'],
            'fuel_consumption' => ['required'],
            'zone_fuel' => ['required']
        ]);

        $flightRoute = FlightRoute::find($request->flight_route);

        $flightRoute->update([
            'from' => $request->from,
            'to' => $request->to,
            'airspeed_cas' => $request->airspeed_cas,
            'temp_c' => $request->temp_c,
            'altitude' => $request->altitude,
            'airspeed_tas' => $request->airspeed_tas,
            'track' => $request->track,
            'wind_true' => $request->wind_true,
            'wind_speed' => $request->wind_speed,
            'heading_true' => $request->heading_true,
            'variation' => $request->variation,
            'heading_magnetic' => $request->heading_magnetic,
            'deviation' => $request->deviation,
            'heading_compass' => $request->heading_compass,
            'ground_speed' => $request->ground_speed,
            'distance' => $request->distance,
            'time' => $request->time,
            'eta' => $request->eta,
            'fuel_consumption' => $request->fuel_consumption,
            'zone_fuel' => $request->zone_fuel,
        ]);


        //dd($request->flight_plan);

        return to_route("flightplan.routes", ['id' => $request->flight_plan_id ]);//to_route(); //)'flight_routes');

    }
}
