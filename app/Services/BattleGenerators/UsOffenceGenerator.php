<?php

namespace App\Services\BattleGenerators;

use App\Models\Battle;
use App\Models\Map;

class UsOffenceGenerator extends BattleGenerator
{
    protected $repository;

    public static function generate(Battle $battle): Battle
    {
        // Create Force ...
        return $battle;
    }
}
