<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'New Arrivals', 'slug' => 'new-arrivals']);//1
        Category::create(['name' => 'Latest', 'slug' => 'latest']);//2
        Category::create(['name' => 'Fashion', 'slug' => 'fashion']);//3
        Category::create(['name' => 'Health & Beauty', 'slug' => 'health']);//4
        Category::create(['name' => 'Electronics', 'slug' => 'electronics']);//5
        Category::create(['name' => 'Groceries', 'slug' => 'groceries']);//6

        Category::create(['name' => 'Men', 'slug' => 'men']);//7
        Category::create(['name' => 'Women', 'slug' => 'women']);//8
        foreach (config('enums.men') as $item){
            Category::create(['name' => $item, 'slug' => $item,'parent_id' => 7]);
        }
        foreach (config('enums.women') as $item){
            Category::create(['name' => $item, 'slug' => $item,'parent_id' => 8]);
        }
        foreach (config('enums.groceries') as $item){
            Category::create(['name' => $item, 'slug' => $item,'parent_id' => 6]);
        }
        foreach (config('enums.health') as $item){
            Category::create(['name' => $item, 'slug' => $item,'parent_id' => 4]);
        }

    }
}
