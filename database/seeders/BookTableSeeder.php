<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $images = [
            "https://img.freepik.com/free-vector/minimalist-book-cover-template_23-2148899519.jpg",
            "https://img.freepik.com/free-vector/modern-annual-report-business-flyer-template-design_1017-25864.jpg",
            "https://img.freepik.com/premium-vector/abstract-annual-report-template_52683-55469.jpg",
            "https://img.freepik.com/free-vector/annual-report-business-brochure-flyer-clean-design_1017-33573.jpg",
            "https://img.freepik.com/premium-vector/city-background-business-book-cover-design-template_1513-143.jpg",
            "https://img.freepik.com/premium-psd/book-cover-mockup_669874-6352.jpg",
            "https://img.freepik.com/premium-vector/cover-design-template-brochure-annual-report-magazine-booklet_762701-416.jpg",
            "https://img.freepik.com/premium-vector/abstract-geometric-modern-cover-book-template-design_544963-1721.jpg"
        ];
        foreach (range(1, 10) as $index) {
            Book::create([
                "title"=> $faker->name(),
                "thumbnail" => $images[random_int(0, count($images) -1)],
                "description" => $faker->text(),
                "price" => $faker->randomFloat(0, 1000, 1000000),
                "buy_quantity" => $faker->numberBetween(1, 900),
            ]);
        }
    }
}
