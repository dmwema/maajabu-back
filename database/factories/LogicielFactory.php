<?php

namespace Database\Factories;

use App\Models\Logiciel;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogicielFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Logiciel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->unique()->name
        ];
    }
}

