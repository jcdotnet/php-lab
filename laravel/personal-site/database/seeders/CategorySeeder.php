<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [ 
            ['slug' => 'uncategorized', 'name' => 'Uncategorized'],
            ['slug' => 'programming', 'name' => 'Programming Languages'],
            ['slug' => 'databases', 'name' => 'Databases'],
            ['slug' => 'design', 'name' => 'Software Design'],
            ['slug' => 'dev', 'name' => 'Software Development'],
            ['slug' => 'web', 'name' => 'Web Development'],
            ['slug' => 'desktop', 'name' => 'Desktop Development'],
            ['slug' => 'mobile', 'name' => 'Mobile App Development'],
            ['slug' => 'wordpress', 'name' => 'WordPress'],
        ];

        foreach ($categories as $key => $category) {    
            DB::table('categories')->insert([
                'slug' => $category['slug'],
                'name' => $category['name'],
            ]);
        }
    }
}
