<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Image::class;
    public function definition()
    {
        return [
            'url' =>'images/'. $this->faker->image('public/storage/images',400,300, null, false)
        ];
    }
}
