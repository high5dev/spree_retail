<?php

namespace Database\Seeders;
use App\Models\Color;
use App\Models\Size;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(AdminSeeder::class);
        
        if(!Color::first()){
            $this->call(ColorSeeder::class);
        }
        if(!Size::first()){
            $this->call(TypeSizeSeeder::class);
            $this->call(SizeSeeder::class);
        }
        //$this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
