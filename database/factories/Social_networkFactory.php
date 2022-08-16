<?php

namespace Database\Factories;

use App\Models\Social_network;
use Illuminate\Database\Eloquent\Factories\Factory;

class Social_networkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Social_network::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->word,
            'studio_id' => rand(1,2),
        ];
    }
}
