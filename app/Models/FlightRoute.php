<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightRoute extends Model
{
    /** @use HasFactory<\Database\Factories\FlightRouteFactory> */
    use HasFactory;

    public $guarded = [];
}
