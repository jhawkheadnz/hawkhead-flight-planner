<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Models\FlightRoute;
use App\Models\FlightPlan;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class FlightRouteController extends Controller
{
    private function getRouteDistance($routes){

        $distance = 0;

        foreach($routes as $route){
            $distance += $route->distance;
        }

        return $distance;

    }

    public function index($id){

        $routes = FlightRoute::where('flight_plan_id', "=", $id)->get();

        $distance = $this->getRouteDistance($routes);
        $distance_km = number_format(($distance * 1.852), 0);
        $from = $routes[0]->from;
        $to = $routes[count($routes) - 1]->to;


        $flightPlan = FlightPlan::find($id);

        return Inertia::render("flightroutes/Index", [
            'flightroutes' => $routes,
            'flightplan' => $flightPlan,
            'total_distance' => $distance,
            'distance_km' => $distance_km,
            'from' => $from,
            'to' => $to
        ]);

    }

    public function edit($flight_route){

        $flightRoute = FlightRoute::find($flight_route);

        //dd($flightRoute);

        return Inertia::render("flightroutes/Edit", [
            'flightroute' => $flightRoute
        ]);

    }


    public function create($flightplan){

        $flightPlan = FlightPlan::find($flightplan);

        return Inertia::render("flightroutes/Create", ['flightplan' => $flightPlan]);

    }

    public function store(Request $request){

        FlightRoute::create([
            'flight_plan_id' => $request->flight_plan_id,
            'from' => $request->from,
            'to' => $request->to,
            'latlng_from' => $request->latlng_from,
            'latlng_to' => $request->latlng_to,
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
            'user_id' => Auth::user(),
            'order' => 0
        ]);

        return to_route("flightplan.routes", ["id" => $request->flight_plan_id]); 

    }

    public function update(Request $request){
        
        $flightRoute = FlightRoute::find($request->flight_route);

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

        return to_route("flightplan.routes", ['id' => $request->flight_plan_id ]);

    }

    public function destroy(Request $request){

        //Get the current flight plan of deletion
        $flightRoute = FlightRoute::find($request->id);
        $flightPlanId = $flightRoute->flight_plan_id;

        FlightRoute::destroy($request->id);

        return to_route("flightplan.routes", $flightPlanId);

    }

}
