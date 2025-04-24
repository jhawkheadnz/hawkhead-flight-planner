<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;

use Inertia\Inertia;

class ChecklistController extends Controller
{
    public function index(){

        $checklists = Checklist::groupBy('group_name')->get();

        return Inertia::render("checklists/Index", [
            'checklists' => $checklists
        ]);

    }
}
