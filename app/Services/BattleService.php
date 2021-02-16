<?php

namespace App\Services;

use App\Constants\BattleMode;
use App\Models\Battle;
use App\Models\Map;
use App\Services\BattleGenerators\DeOffenceGenerator;
use App\Services\BattleGenerators\UsOffenceGenerator;
use App\Services\BattleGenerators\WarfareGenerator;
use Illuminate\Support\Collection;

class BattleService
{
    protected $repository;

    /**
     * @param Map $map
     * @param array $battleInformation
     * @return Battle
     */
    public function generate(Map $map, array $battleInformation): Battle
    {
        return call_user_func_array(
            [
                $this->registerBattleGenerator()[$battleInformation['mode']],
                'generate'
            ],
            [
                $map,
                $battleInformation
            ]
        );
    }

    /**
     * @return Map[]|\Illuminate\Database\Eloquent\Collection|Collection
     */
    public function getMapForRichSelect()
    {
        return Map::all()->map(
            function ($map) {
                return [
                    'id'   => $map->id,
                    'text' => $map->name,
                ];
            }
        );
    }

    public function getModeForRadioGroup()
    {
        $result = [];
        foreach (BattleMode::getConstants() as $key => $value) {
            array_push(
                $result,
                [
                    'key'  => $value,
                    'description' => $key,
                ]
            );
        }
        return $result;
    }

    /**
     * @return string[]
     */
    private function registerBattleGenerator(): array
    {
        return [
            BattleMode::WARFARE    => WarfareGenerator::class,
            BattleMode::US_OFFENCE => UsOffenceGenerator::class,
            BattleMode::DE_OFFENCE => DeOffenceGenerator::class,
        ];
    }
}
