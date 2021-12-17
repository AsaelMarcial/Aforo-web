<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Reservation;
use App\Models\Schedule;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {

        $this->Call(UserSeeder::class);
        Category::factory(5)->create();
        $this->call(CommerceSeeder::class);
        Schedule::factory(50)->create();
        Reservation::factory(10)->create();

    }
}
