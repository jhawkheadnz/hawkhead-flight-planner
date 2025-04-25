<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Collection;

use App\Models\Checklist;

class ChecklistGroup extends Model
{
    use HasFactory;

    public function checklists(){

        return $this->hasMany(Checklist::class);

    }

}
