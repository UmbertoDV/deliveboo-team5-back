<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Dish;
use App\Models\Order;

class DishOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $dish = Dish::find(1);
        // $dish->orders()->attach($dish, ['quantity' => 2]);

        // for ($i = 1; $i < 3; $i++) {
        //     $dish = Dish::find($i);
        //     $dish->orders()->attach($dish, ['quantity' => random_int(1, 20)]);
        // }
    }
}
