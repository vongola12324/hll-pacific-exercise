<?php

namespace App\Services\BattleGenerators;

use App\Models\Battle;
use App\Models\Map;
use Carbon\Carbon;

class BattleGenerator
{
    /**
     * @param Battle $battle
     * @return Battle
     */
    public static function generate(Battle $battle): Battle
    {
        return $battle;
    }
}
