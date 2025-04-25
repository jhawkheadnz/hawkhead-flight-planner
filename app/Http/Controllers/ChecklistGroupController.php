<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\DB;
use App\Models\ChecklistGroup;
use App\Models\Checklist;

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

    public function show($tag_name){

        $checklists = DB::table("checklist_groups")
            ->join("checklists", "checklist_groups.id", "=", "checklists.checklist_group_id")->where("tag_name", $tag_name)->get();

        $checklistGroup = ChecklistGroup::where("tag_name", $tag_name)->first();

        return Inertia::render("checklists/Show", [
            'checklist_group' => $checklistGroup,
            'checklists' => $checklists,
            'tag_name' => $tag_name
         ]);
        
    }


}
