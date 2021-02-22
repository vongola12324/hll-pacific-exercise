<?php

namespace App\Services\BattleGenerators;

use App\Models\Battle;
use App\Models\Division;
use App\Models\Force;
use App\Models\Map;

class WarfareGenerator extends BattleGenerator
{
    protected $repository;

    public static function generate(Battle $battle): Battle
    {
        // Create Force
        $forceNames = ['Axis', 'Allied'];
        $forces = [];
        foreach ($forceNames as $forceName) {
            $force = Force::create(
                [
                    'battle_id'  => $battle->id,
                    'name'       => $forceName,
                    'max_people' => 50,
                ]
            );
            array_push($forces, $force);
        }

        // Create Division
        $divisionLimits = [
            'Commander' => [
                'limit_squad'        => 1,
                'limit_squad_player' => 1,
                'limit_total_player' => 1,
            ],
            'Infantry'  => [
                'limit_squad'        => -1,
                'limit_squad_player' => 6,
                'limit_total_player' => -1,
            ],
            'Tank'     => [
                'limit_squad'        => 6,
                'limit_squad_player' => 3,
                'limit_total_player' => -1,
            ],
            'Recon'     => [
                'limit_squad'        => 2,
                'limit_squad_player' => 2,
                'limit_total_player' => -1,
            ],
            'Artillery' => [
                'limit_squad'        => 3,
                'limit_squad_player' => 3,
                'limit_total_player' => 3,
            ],
            'Reserve'   => [
                'limit_squad'        => -1,
                'limit_squad_player' => 6,
                'limit_total_player' => 49,
            ],
        ];
        foreach ($forces as $force) {
            foreach ($divisionLimits as $divisionName => $limit) {
                Division::create(
                    [
                        'force_id'           => $force->id,
                        'name'               => $divisionName,
                        'limit_squad'        => $limit['limit_squad'],
                        'limit_squad_player' => $limit['limit_squad_player'],
                        'limit_total_player' => $limit['limit_total_player'],
                    ]
                );
            }
        }
        return $battle;
    }
}
