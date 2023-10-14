<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Tag 1',
            'slug' => 'Tag1',
        ]);

        Tag::create([
            'name' => 'Tag 2',
            'slug' => 'Tag2',
        ]);

        Tag::create([
            'name' => 'Tag 3',
            'slug' => 'Tag3',
        ]);
    }
}
