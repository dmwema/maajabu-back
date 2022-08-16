<?php

namespace Database\Factories;

use App\Models\Horaire;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class HoraireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Horaire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'day' => 'Lundi',
            'go_before_midday' => $this->faker->dateTimeThisMonth()->format('H:i:s'),
            'end_before_midday' => $this->faker->dateTimeThisMonth()->format('H:i:s'),
            'go_after_midday' => $this->faker->dateTimeThisMonth()->format('H:i:s'),
            'end_after_midday' => $this->faker->dateTimeThisMonth()->format('H:i:s')
        ];
    }
}
