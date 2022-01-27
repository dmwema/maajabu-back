<?php

namespace Database\Factories;

use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Studio::class;

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
            'description' => $this->faker->sentence,
            'history' => $this->faker->paragraph,
            'adresse' => $this->faker->address,
            'url_maps' => $this->faker->url,

        ];
    }
}
