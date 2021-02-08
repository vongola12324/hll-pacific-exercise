<?php

namespace Database\Factories;

use App\Models\Force;
use Illuminate\Database\Eloquent\Factories\Factory;

class ForceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Force::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'battle_id'  => null,
            'name'       => $this->faker->randomElement(['Axis', 'Allied']),
            'max_people' => 50,
        ];
    }
}
