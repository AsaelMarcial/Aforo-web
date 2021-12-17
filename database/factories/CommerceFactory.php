<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Commerce;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommerceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Commerce::class;

    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(100),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'capacity' => $this->faker->numberBetween(1, 100),
            'available_capacity' => $this->faker->numberBetween(1, 100),
            'services' => $this->faker->text(500),
            'status' => $this->faker->randomElement(['1', '2']),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
