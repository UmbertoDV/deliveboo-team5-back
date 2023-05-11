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
        // $orders = Order::all()->pluck('id');
        // $dishes = Dish::all()->pluck('id');

        // for ($i = 0; $i < 1; $i++) {
        //     $order = Order::find($i);
        //     $order->dishes()->attach($faker->randomElements($dishes));
        //     $orders->dishes()->attach($dishes, ['quantity' => 2]);
        // }
    }
}
