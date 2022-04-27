<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            [
                'name' => 'Red',
                'color_code' => '#FF0000'
            ],
            [
                'name' => 'Cyan',
                'color_code' => '#00FFFF'
            ],
            [
                'name' => 'Blue',
                'color_code' => '#0000FF'
            ],
            [
                'name' => 'DarkBlue',
                'color_code' => '#00008B'
            ],
            [
                'name' => 'LightBlue',
                'color_code' => '#ADD8E6'
            ],
            [
                'name' => 'Purple',
                'color_code' => '#800080'
            ],
            [
                'name' => 'Yellow',
                'color_code' => '#FFFF00'
            ],
            [
                'name' => 'Lime',
                'color_code' => '#00FF00'
            ],
            [
                'name' => 'Magenta',
                'color_code' => '#FF00FF'
            ],
            [
                'name' => 'Pink',
                'color_code' => '#FFC0CB'
            ],
            [
                'name' => 'Aquamarine',
                'color_code' => '#7FFD4'
            ],
            [
                'name' => 'Olive',
                'color_code' => '#808000'
            ]
        ];

        Color::insert($colors);
    }
}
