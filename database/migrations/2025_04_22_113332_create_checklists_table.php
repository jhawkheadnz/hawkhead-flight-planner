<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\ChecklistGroup;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(ChecklistGroup::class); // converted into spearpate table
            $table->foreignIdFor(User::class);

            $table->string("name"); // name of the checklist example: C152 Checklists
            $table->string("description"); // describes the checklist
            $table->integer("order")->default(0); // set order that checklists should be displayed
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklists');
    }

    

};
