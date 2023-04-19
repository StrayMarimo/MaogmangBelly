<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dummy Data
        DB::table('products')->insert([
            [
                'name' => 'Baked Macaroni',
                'description' => "a rich and creamy dish consisting of macaroni pasta mixed with a cheesy sauce",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "baked_macaroni.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 1
            ],
            [
                'name' => 'Crispy Pork Kare-Kare',
                'description' => "crispy pork belly in peanut sauce and filipino vegetables, served with shrimp paste",
                'price' => 1000,
                'price_20pax' => 1950,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "crispy_pork_kare_kare.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 2
            ],
            [
                'name' => 'Crispy Korean Honey Soy Chicken',
                'description' => "big-sized fried chicken topped with honey soy garlic",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "crispy_korean_honey_soy_chiken.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Coffee Jelly',
                'description' => "a dessert consisting of coffee flavored gelatin cubes served with milk and whipped cream topping and shaved chocolate.",
                'price' => 700,
                'price_20pax' => 1400,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "coffee_jelly.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 4
            ],
        ]);
    }
}
