<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Squad;
use Illuminate\Database\Seeder;

class SquadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = Division::all();

        foreach ($divisions as $division) {
            Squad::factory()->count(random_int(0, 4))->create(
                [
                    'division_id' => $division->id,
                ]
            );
        }
    }
}
