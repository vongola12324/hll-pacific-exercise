<?php

namespace App\Services\BattleGenerators;

use App\Models\Battle;
use App\Models\Map;

class BattleGenerator
{
    /**
     * @param Map $map
     * @param array $battleInformation
     * @return Battle
     */
    public static function generate(Map $map, array $battleInformation): Battle
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
