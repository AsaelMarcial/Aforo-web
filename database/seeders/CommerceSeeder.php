<?php

namespace Database\Seeders;

use App\Models\Commerce;
use App\Models\Image;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commerces = Commerce::factory(200)->create();

        foreach ($commerces as $commerce) {
            Image::factory()->create([
                'imageable_id' => $commerce->id,
                'imageable_type' => Commerce::class
            ]);
        }
    }
}
