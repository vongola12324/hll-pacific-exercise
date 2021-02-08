<?php

namespace App\Services\BattleGenerators;

use App\Models\Battle;
use App\Models\Map;
use Illuminate\Database\Eloquent\Model;

class BattleGenerator
{
    /**
     * @param Map $map
     * @param array $battleInformation
     * @return Battle|Model
     */
    public function generate(Map $map, array $battleInformation)
    {
        return Battle::create(
            [
                'map_id'     => $map->id,
                'name'       => $battleInformation['name'],
                'mode'       => $battleInformation['mode'],
                'meeting_at' => $battleInformation['meeting_at'],
                'match_at'   => $battleInformation['match_at'],
                'max_people' => $battleInformation['max_people'],
            ]
        );
    }
}
