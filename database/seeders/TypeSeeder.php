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
        $labels = ['Americano', 'Caffé', 'Carne', 'Cinese', 'Dolci', 'Fast Food', 'Fritti', 'Giapponese', 'Indiano', 'Kebab', 'Messicano', 'Pesce', 'Pinsa', 'Pizza', 'Poke', 'Senza Glutine', 'Vegan', 'Italiano'];

        $type = new Type;
        $type->name = $labels[1];
        $type->image = '';
        $type->color = '#008678';
        $type->save();

        $type = new Type;
        $type->name = $labels[2];
        $type->image = '';
        $type->color = '#006775';
        $type->save();

        $type = new Type;
        $type->name = $labels[3];
        $type->image = '';
        $type->color = '#2F4858';
        $type->save();

        $type = new Type;
        $type->name = $labels[4];
        $type->image = '';
        $type->color = '#8FB531';
        $type->save();

        $type = new Type;
        $type->name = $labels[5];
        $type->image = '';
        $type->color = '#F2BB05';
        $type->save();

        $type = new Type;
        $type->name = $labels[6];
        $type->image = '';
        $type->color = '#005249';
        $type->save();

        $type = new Type;
        $type->name = $labels[7];
        $type->image = '';
        $type->color = '#4B8178';
        $type->save();

        $type = new Type;
        $type->name = $labels[8];
        $type->image = '';
        $type->color = '#402E32';
        $type->save();

        $type = new Type;
        $type->name = $labels[9];
        $type->image = '';
        $type->color = '#C1564C';
        $type->save();

        $type = new Type;
        $type->name = $labels[10];
        $type->image = '';
        $type->color = '#FD8B7D';
        $type->save();

        $type = new Type;
        $type->name = $labels[11];
        $type->image = '';
        $type->color = '#FFC2B1';
        $type->save();

        $type = new Type;
        $type->name = $labels[12];
        $type->image = '';
        $type->color = '#00AC94';
        $type->save();

        $type = new Type;
        $type->name = $labels[13];
        $type->image = '';
        $type->color = '#F2BB05';
        $type->save();

        $type = new Type;
        $type->name = $labels[14];
        $type->image = '';
        $type->color = '#00C9FF';
        $type->save();

        $type = new Type;
        $type->name = $labels[15];
        $type->image = '';
        $type->color = '#FF2EAB';
        $type->save();

        $type = new Type;
        $type->name = $labels[16];
        $type->image = '';
        $type->color = '#FFB982';
        $type->save();

        $type = new Type;
        $type->name = $labels[17];
        $type->image = '';
        $type->color = '#FFB850';
        $type->save();
    }
}
