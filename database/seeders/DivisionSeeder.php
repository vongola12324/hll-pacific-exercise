<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Force;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forces = Force::all();
        foreach ($forces as $force) {
            Division::factory()->count(6)->create(
                [
                    'force_id' => $force->id,
                ]
            );
        }
    }
}
