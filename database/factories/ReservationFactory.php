<?php

namespace Database\Factories;

use App\Models\Commerce;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Reservation::class;
    public function definition()
    {
        return [
            'reservation_date' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            'amount_of_people' => $this->faker->numberBetween(1, 10),
            'user_id' => User::all()->random()->id,
            'commerce_id' => Commerce::all()->random()->id,
        ];
    }
}
