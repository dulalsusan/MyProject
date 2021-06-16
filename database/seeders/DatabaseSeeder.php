<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
     {  
        Category::factory(8)->create();

        // \App\Models\User::factory(10)->create();
        // \App\Models\Product::truncate();
        \App\Models\Product::factory(10)->create();

    }
}
