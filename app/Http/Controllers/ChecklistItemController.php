<?php

namespace App\Http\Controllers;
use Inertia\Inertia;


use Illuminate\Http\Request;

use App\Models\Checklist;
use App\Models\ChecklistItem;
use App\Models\ChecklistGroup;

class ChecklistItemController extends Controller
{
    public function show($tag_name, $item){

        // get name of checklist group
        $checklistGroup = ChecklistGroup::where("tag_name", $tag_name)->first();

        // Get checklist name
        //$checklistName = $checklistGroup->checklists->where('checklist_id', $item);
        $checklistName = Checklist::find($item)->name;

        // get checklist items
        $checklistItems = ChecklistItem::where("checklist_id", $item)->get();

        return Inertia::render("checklists/Checklist", [
            'checklist_items' => $checklistItems,
            'checklist_title' => $checklistName
        ]);

    }
}
