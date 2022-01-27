<?php

namespace Database\Factories;

use App\Models\Engineer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EngineerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Engineer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->unique()->name,
            'year_experience' => random_int(1,5),

        ];
    }
}
