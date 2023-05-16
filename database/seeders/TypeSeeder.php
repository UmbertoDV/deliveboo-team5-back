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

        // Americano
        $type = new Type;
        $type->name = $labels[0];
        $type->image = 'https://svgshare.com/i/tCb.svg';
        $type->color = '#B31942';
        $type->save();

        // Caffè
        $type = new Type;
        $type->name = $labels[1];
        $type->image = 'https://www.svgrepo.com/show/427612/cafe-coffee-cup.svg';
        $type->color = '#6f4e37';
        $type->save();

        // Carne
        $type = new Type;
        $type->name = $labels[2];
        $type->image = 'https://svgshare.com/i/t8t.svg';
        $type->color = '#f9906f';
        $type->save();

        // Cinese
        $type = new Type;
        $type->name = $labels[3];
        $type->image = 'https://svgshare.com/i/tBE.svg';
        $type->color = '#aa381e';
        $type->save();

        // Dolci
        $type = new Type;
        $type->name = $labels[4];
        $type->image = 'https://svgshare.com/i/tCV.svg';
        $type->color = '#ECBADB';
        $type->save();

        // Fast Food
        $type = new Type;
        $type->name = $labels[5];
        $type->image = 'https://svgshare.com/i/tCU.svg';
        $type->color = '#982121';
        $type->save();

        // Fritti
        $type = new Type;
        $type->name = $labels[6];
        $type->image = 'https://svgshare.com/i/tCG.svg';
        $type->color = '#F4C63E';
        $type->save();

        // Giapponese
        $type = new Type;
        $type->name = $labels[7];
        $type->image = 'https://svgshare.com/i/tAZ.svg';
        $type->color = '#BC212E';
        $type->save();

        // Indiano
        $type = new Type;
        $type->name = $labels[8];
        $type->image = 'https://svgshare.com/i/tCW.svg';
        $type->color = '#ce923c';
        $type->save();

        // Kebab
        $type = new Type;
        $type->name = $labels[9];
        $type->image = 'https://svgshare.com/i/tCx.svg';
        $type->color = '#cd9358';
        $type->save();

        // Messicano
        $type = new Type;
        $type->name = $labels[10];
        $type->image = 'https://svgshare.com/i/tCo.svg';
        $type->color = '#006341';
        $type->save();

        // Pesce
        $type = new Type;
        $type->name = $labels[11];
        $type->image = 'https://svgshare.com/i/tBF.svg';
        $type->color = '#000080';
        $type->save();

        // Pinsa
        $type = new Type;
        $type->name = $labels[12];
        $type->image = 'https://svgshare.com/i/tCp.svg';
        $type->color = '#e1d800';
        $type->save();

        // PIzza
        $type = new Type;
        $type->name = $labels[13];
        $type->image = 'https://svgshare.com/i/tBG.svg';
        $type->color = '#e12301';
        $type->save();

        // Pokè
        $type = new Type;
        $type->name = $labels[14];
        $type->image = 'https://svgshare.com/i/tBZ.svg';
        $type->color = '#ff6781';
        $type->save();

        // Senza Glutine
        $type = new Type;
        $type->name = $labels[15];
        $type->image = 'https://svgshare.com/i/tC7.svg';
        $type->color = '#ddcc66';
        $type->save();

        // Vegano
        $type = new Type;
        $type->name = $labels[16];
        $type->image = 'https://svgshare.com/i/tCc.svg';
        $type->color = '#22bb88';
        $type->save();

        // Italiano
        $type = new Type;
        $type->name = $labels[17];
        $type->image = 'https://svgshare.com/i/tC8.svg';
        $type->color = '#009246';
        $type->save();
    }
}