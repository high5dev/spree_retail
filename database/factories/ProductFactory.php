<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\TypeSize;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $typeSizes = TypeSize::pluck('id')->toArray();
        return [
            'user_id' => 1000000,
            'name' => 'Shoes',
            'main' => 'Fashion',
            'slug' => $this->faker->name,
            'quantity' => 50,
            'remaining' => 50,
            'price' => $this->faker->numberBetween(25,500),
            'description' => $this->faker->text,
            'thumbnail' => 'n2.jpg',
            'length' => 10,
            'width' => 10,
            'height' => 3,
            'weight' => 2,
            'status' => 'Active',
            'type_size_id' => $this->faker->randomElement($typeSizes)
        ];
    }
//    /**
//     * Configure the model factory.
//     *
//     * @return $this
//     */
//    public function configure()
//    {
//        return $this->afterMaking(function (Product $product) {
//            //
//        })->afterCreating(function (Product $product) {
//            $product->categories()->attach(1);
//        });
//    }
}
