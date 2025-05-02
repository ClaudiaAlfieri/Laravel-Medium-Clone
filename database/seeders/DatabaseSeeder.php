<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category =[
            'Technology',
            'Health',
            'Science',
            'Sports',
            'Politics',
            'Entertainment',
        ];

        foreach ($category as $category) {
            Category::create(['name'=> $category,
            ]);
        }

        Post::factory(100)->create();
    }
}
