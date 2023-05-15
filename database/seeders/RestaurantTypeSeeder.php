<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Restaurant;
use App\Models\Type;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $types = Type::all()->pluck('id');

        // for ($i = 1; $i < 3; $i++) {
        //     $restaurant = Restaurant::find($i);
        //     $restaurant->types()->attach($faker->randomElements($types));
        // }
    }
}