<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\FlightPlan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flight_routes', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(FlightPlan::class);

            $table->string("from");
            $table->string("to");
            $table->integer("airspeed_cas"); // calibrated air speed
            $table->decimal("temp_c"); // temperature °c
            $table->integer("altitude"); // altitude
            $table->integer("airspeed_tas"); // true airspeed
            $table->integer("track");
            $table->integer("wind_true"); // wind in °T (degrees true)
            $table->integer("wind_speed"); // wind speed in knots
            $table->integer("heading_true"); // heading in degrees true
            $table->string("variation"); //magnetic variation
            $table->integer("heading_magnetic"); // magnetic heading (heading_true +/- variation)
            $table->string("deviation"); // magnetic deviation
            $table->integer("heading_compass"); // heading on compass based on deviation
            $table->integer("ground_speed");
            $table->decimal("distance"); // distance in nautical miles
            $table->string("time"); // time in minutes
            $table->string("eta");
            $table->decimal("fuel_consumption");
            $table->string("zone_fuel");

            $table->integer("order");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_routes');
    }
};
