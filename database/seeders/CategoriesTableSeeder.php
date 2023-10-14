<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Category 1',
            'slug' => 'Category1',
            'description' => 'Courses Category'
        ]);

        Category::create([
            'name' => 'Category 2',
            'slug' => 'Category2',
            'description' => 'Courses Category'
        ]);

    }
}
