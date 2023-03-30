<?php

namespace Database\Factories;

use App\Models\Airways;
use Illuminate\Database\Eloquent\Factories\Factory;

class AirwaysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Airways::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->word,
        'name_hu' => $this->faker->word,
        'name_sk' => $this->faker->word,
        'name_de' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
