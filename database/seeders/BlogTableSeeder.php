<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            Blog::create([
                'name' => $faker->name(),
                'thumbnail' => $faker->imageUrl(),
                'content' => $faker->text(),
                'description' => $faker->text(40),
            ]);
        }
    }
}
