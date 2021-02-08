<?php

namespace Database\Seeders;

use App\Models\Battle;
use App\Models\Map;
use Illuminate\Database\Seeder;

class BattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = Map::all();
        Battle::factory()->count(20)->create(
            [
                'map_id' => $maps->random()->id,
            ]
        );
    }
}
