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
                'name' => 'Sizzling Pork sisig',
                'description' => "a variety of crispy pig parts, chicken livers, and a punchy, acidic dressing.",
                'price' => 120,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "https://panlasangpinoy.com/wp-content/uploads/2014/10/Pork-Sisig-500x500.jpg",
                'category_id' => 1
            ],
            [
                'name' => 'Lumpia Shanghai',
                'description' => "Spring rolls made of ground pork, chicken, or beef filling wrapped in thin crepes called lumpia wrappers",
                'price' => 100,
                'stock' => 50,
                'total_sold' => 0,
                'gallery' => "https://omnivorescookbook.com/wp-content/uploads/2020/12/201113_Lumpia-Shanghai_550.jpg",
                'category_id' => 1
            ],
            [
                'name' => 'Beef Tapa',
                'description' => "dried, cured beef similar to beef jerky",
                'price' => 150,
                'stock' => 10,
                'total_sold' => 0,
                'gallery' => "https://www.lutongbahayrecipe.com/wp-content/uploads/2021/02/lutong-bahay-homemade-beef-tapa.jpg",
                'category_id' => 2
            ],
            [
                'name' => 'Boneless Daing na Bangus',
                'description' => "a fried milkfish dish wherein the fish is marinated in a vinegar mixture and then fried until brown and crispy.",
                'price' => 80,
                'stock' => 15,
                'total_sold' => 0,
                'gallery' => "https://cdn.tastephilippines.com/wp-content/uploads/2022/10/golden-brown-fried-bangus-from-the-Philippines.jpg?strip=all&lossy=1&ssl=1",
                'category_id' => 3
            ],
            [
                'name' => 'Pakbet',
                'description' => "mixed vegetables sautéed in fish or shrimp sauce",
                'price' => 100,
                'stock' => 25,
                'total_sold' => 0,
                'gallery' => "https://www.kawalingpinoy.com/wp-content/uploads/2013/04/pinakbet-tagalog-7-1200.jpg",
                'category_id' => 4
            ],
        ]);
    }
}
