<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $labels = ['Americano', 'Caffé', 'Carne', 'Cinese', 'Dolci', 'Fast Food', 'Fritti', 'Giapponese', 'Indiano', 'Kebab', 'Messicano', 'Pesce', 'Pinsa', 'Pizza', 'Poke', 'Senza Glutine', 'Vegan'];

        foreach ($labels as $label) {
            $type = new Type;
            $type->name = $label;
            $type->color = $faker->hexColor();;
            $type->save();
        }
    }
}
