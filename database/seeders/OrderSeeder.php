<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Order;
        $order->name = "Domenico";
        $order->surname = "Lo Giudice";
        $order->address = "Via del Casale di San Pio 3";
        $order->email = "domenico@gmail.com";
        $order->telephone = "+39 34056733367";
        $order->note = "Doppio Bacon perfavore.";
        $order->status = 'In arrivo';
        $order->total = '200';
        $order->save();
    }
}
