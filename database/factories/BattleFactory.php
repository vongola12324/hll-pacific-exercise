<?php

namespace Database\Factories;

use App\Constants\BattleMode;
use App\Models\Battle;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

class BattleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Battle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $meeting_at = $this->faker->dateTime();
        return [
            'map_id'     => null,
            'name'       => $this->faker->lastName . ' Battle',
            'mode'       => $this->faker->randomElement(BattleMode::getValues()),
            'meeting_at' => $meeting_at,
            'match_at'   => $meeting_at->add(DateInterval::createFromDateString('30 minutes')),
            'max_people' => 100,
        ];
    }
}
