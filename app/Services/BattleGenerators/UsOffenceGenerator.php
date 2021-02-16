<?php

namespace App\Services\BattleGenerators;

use App\Models\Battle;
use App\Models\Map;

class UsOffenceGenerator extends BattleGenerator
{
    protected $repository;

    public static function generate(Map $map, array $battleInformation): Battle
    {
        // Create Battle
        $battle = parent::generate($map, $battleInformation);
        // Create Force ...
        return $battle;
    }
}
