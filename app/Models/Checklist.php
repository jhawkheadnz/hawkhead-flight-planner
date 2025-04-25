<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ChecklistItem;

class Checklist extends Model
{
    use HasFactory;

    public function checklistItems(){

        return $this->hasMany(ChecklistItem::class);

    }
}
