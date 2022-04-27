<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\TypeSize;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                'name' => 'XS',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']
            ],
            [
                'name' => 'S',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']
            ],
            [
                'name' => 'M',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']
            ],
            [
                'name' => 'L',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']
            ],
            [
                'name' => 'XL',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']
            ],
            [
                'name' => 'XXL',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']
            ]
        ];

        for($i = 4; $i <= 50; $i+=0.5) {
            array_push($sizes, [
               'name' => $i,
                'product_type' => Size::PRODUCT_TYPE['SHOE']
            ]);
        }

        for($i = 23; $i <= 42; $i++) {
            array_push($sizes, [
                'name' => $i,
                'product_type' => Size::PRODUCT_TYPE['DENIM']
            ]);
        }

        Size::insert($sizes);
    }
}
