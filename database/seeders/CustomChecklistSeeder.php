<?php 

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use App\Models\Checklist;
use App\Models\ChecklistGroup;
use App\Models\ChecklistItem;

class CustomChecklistSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ChecklistGroup::factory()->create([
            'user_id' => 1,
            'name' => "Cessna 152 Aerobat - ZK-FWK",
            'description' => 'Checklist for Cessna 152 Aerobat',
            'tag_name' => "cessna-152-aerobat-zk-fwk",
            'order' => 0
        ]);
        
        ChecklistGroup::factory()->create([
            'user_id' => 1,
            'name' => "Piper Archer PA28 - ZK-FQQ",
            'description' => 'Checklist for Piper Archer',
            'tag_name' => "piper-archer-pa28-zkfqq",
            'order' => 1
        ]);

        
        // generate seeders for sample content
        Checklist::factory()->create([
            'checklist_group_id' => 1,
            'name' => "Preflight",
            'description' => "Preflight for Cessna 152 aerobat ZK-FWK",
            'user_id' => 1,
            'order' => 0
        ]);


    }

    
}
