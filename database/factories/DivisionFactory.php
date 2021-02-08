<?php

namespace Database\Factories;

use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

class DivisionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Division::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'force_id'           => null,
            'name'               => $this->faker->randomElement(
                ['Commander', 'Infantry', 'Tanks', 'Recon', 'Artillery', 'Reserve']
            ),
            'limit_squad'        => 3,
            'limit_squad_player' => 3,
            'limit_total_player' => -1,
        ];
    }
}
