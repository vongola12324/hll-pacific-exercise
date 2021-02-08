<?php

namespace Database\Seeders;

use App\Models\Battle;
use App\Models\Force;
use Illuminate\Database\Seeder;

class ForceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $battles = Battle::all();
        foreach ($battles as $battle) {
            Force::factory()->count(2)->create(
                [
                    'battle_id' => $battle->id,
                ]
            );
        }
    }
}
