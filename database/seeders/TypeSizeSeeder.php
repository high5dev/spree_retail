<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\TypeSize;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TypeSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_sizes = [
            [
                'name' => 'Shoe',
                'product_type' => Size::PRODUCT_TYPE['SHOE']
            ],
            [
                'name' => 'Waist',
                'product_type' => Size::PRODUCT_TYPE['APPAREL']

            ],
            [
                'name' => 'Denim',
                'product_type' => Size::PRODUCT_TYPE['DENIM']
            ]
        ];

        TypeSize::insert($type_sizes);
    }
}
