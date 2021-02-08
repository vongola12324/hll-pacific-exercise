<?php

namespace App\Services;

use App\Constants\BattleMode;
use App\Models\Map;
use App\Services\BattleGenerators\DeOffenceGenerator;
use App\Services\BattleGenerators\UsOffenceGenerator;
use App\Services\BattleGenerators\WarfareGenerator;

class BattleService
{
    protected $repository;

    /**
     * @param Map $map
     * @param array $battleInformation
     * @return false|mixed
     */
    public function generate(Map $map, array $battleInformation)
    {
        return call_user_func(
            $this->registerBattleGenerator()[$battleInformation['mode']],
            'generator',
            $map,
            $battleInformation
        );
    }

    /**
     * @return string[]
     */
    private function registerBattleGenerator(): array
    {
        return [
            BattleMode::WARFARE => WarfareGenerator::class,
            BattleMode::US_OFFENCE => UsOffenceGenerator::class,
            BattleMode::DE_OFFENCE => DeOffenceGenerator::class,
        ];
    }
}
