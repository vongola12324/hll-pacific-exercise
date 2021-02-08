<?php

use App\Models\Map;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Map::create(['name' => 'Sainte-Marie-du-Mont']);
        Map::create(['name' => 'Sainte-Mère-Église']);
        Map::create(['name' => 'Foy']);
        Map::create(['name' => 'Hürtgen Forest']);
        Map::create(['name' => 'Hill 400']);
        Map::create(['name' => 'Purple Heart Lane']);
        Map::create(['name' => 'Omaha Beach']);
        Map::create(['name' => 'Utah Beach']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Map::truncate();
    }
}
