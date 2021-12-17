<?php

namespace Database\Factories;

use App\Models\Commerce;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Schedule::class;
    public function definition()
    {
        return [
            'sunday' => $this->faker->word,
            'monday' => $this->faker->word,
            'tuesday' => $this->faker->word,
            'wednesday' => $this->faker->word,
            'thursday' => $this->faker->word,
            'friday' => $this->faker->word,
            'saturday' => $this->faker->word,
            'commerce_id' => Commerce::all()->random()->id
        ];
    }
}
