<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Checklist;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checklist_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class); // see who created the checklist group
            
            $table->string("name"); // name of group of checklists
            $table->string("description"); // describe checklist group
            $table->string("tag_name"); // tag used to show group
            
            $table->integer("order")->default(0); // order of checklist groups if custom

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_groups');
    }

    

};
