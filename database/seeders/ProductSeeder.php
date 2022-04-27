<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\TypeSize; 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator;
use Illuminate\Container\Container;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $this->withFaker(); 

        $sizes = Size::select('product_type', 'id')->get()->groupBy('product_type')->map(function($groups){
             return $groups->map(function($item){
                 return $item->id; 
             });
        })->toArray();
        $colors = Color::pluck('id')->toArray();

        Product::factory()
            ->count(50)
            ->create()
            ->each(function($product) use ($sizes, $faker, $colors){
                if($product->type_size){
                    $sizes = $sizes[$product->type_size->product_type];
                    $product->sizes()->sync($faker->randomElements($sizes, $faker->numberBetween(1, count($sizes)-1)));
                    $product->colors()->sync($faker->randomElements($colors, $faker->numberBetween(1, count($colors))));
                }
            });


//        Product::create([
//            'user_id' => 1000000,
//            'name' => 'Cyber',
//            'slug' => 'cyber-1',
//            'quantity' => 50,
//            'remaining' => 50,
//            'price' => 400,
//            'description' => 'sdafasdfasdfsdafasdf',
//            'thumbnail' => 'temp.jpg',
//            'status' => 'Active',
//        ]);
//
//        DB::table('category_product')->insert(
//            ['product_id' => 2000001, 'category_id' => 1]
//        );
    }


    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
}
