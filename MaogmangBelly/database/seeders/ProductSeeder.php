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
        // DB::table('products')->insert([
        //     [
        //         'name' => 'Sizzling Pork sisig',
        //         'price' => '100',
        //         'description' => "a variety of crispy pig parts, chicken livers, and a punchy, acidic dressing.",
        //         'category' => "Pork",
        //         'gallery' => "https://panlasangpinoy.com/wp-content/uploads/2014/10/Pork-Sisig-500x500.jpg"
        //     ],
        //     [
        //         'name' => 'Lumpia Shanghai',
        //         'price' => '100',
        //         'description' => "Spring rolls made of ground pork, chicken, or beef filling wrapped in thin crepes called lumpia wrappers",
        //         'category' => "Pork",
        //         'gallery' => "https://omnivorescookbook.com/wp-content/uploads/2020/12/201113_Lumpia-Shanghai_550.jpg"
        //     ],
        //     [
        //         'name' => 'Beef Tapa',
        //         'price' => '150',
        //         'description' => "dried, cured beef similar to beef jerky",
        //         'category' => "Beef",
        //         'gallery' => "https://www.lutongbahayrecipe.com/wp-content/uploads/2021/02/lutong-bahay-homemade-beef-tapa.jpg"
        //     ],
        //     [
        //         'name' => 'Boneless Daing na Bangus',
        //         'price' => '80',
        //         'description' => "a fried milkfish dish wherein the fish is marinated in a vinegar mixture and then fried until brown and crispy.",
        //         'category' => "fish",
        //         'gallery' => "https://cdn.tastephilippines.com/wp-content/uploads/2022/10/golden-brown-fried-bangus-from-the-Philippines.jpg?strip=all&lossy=1&ssl=1"
        //     ],
        //     [
        //         'name' => 'Pakbet',
        //         'price' => '100',
        //         'description' => "mixed vegetables sautéed in fish or shrimp sauce",
        //         'category' => "Veggies",
        //         'gallery' => "https://www.kawalingpinoy.com/wp-content/uploads/2013/04/pinakbet-tagalog-7-1200.jpg"
        //     ],
        // ]);
    }
}
