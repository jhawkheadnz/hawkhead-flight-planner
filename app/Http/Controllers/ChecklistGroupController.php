<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\ChecklistGroup;

class ChecklistGroupController extends Controller
{
    //
    public function index()
    {
        $checklistGroups = ChecklistGroup::all();

        return Inertia::render("checklists/Index", [
            'checklist_groups' => $checklistGroups
        ]);
    }


}
