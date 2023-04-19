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
        DB::table('products')->insert([[
                'name' => 'Baked Macaroni',
                'description' => "A pasta dish made with elbow macaroni, cheese, and breadcrumbs, baked until golden brown and bubbly.",
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
                'name' => 'Classic Lasagna',
                'description' => "A layered Italian pasta dish made with lasagna noodles, meat or vegetable sauce, ricotta cheese, and mozzarella cheese, baked until hot and gooey.",
                'price' => 950,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "classic_lasagna.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 1
            ],
            [
                'name' => 'Baked Spaghetti',
                'description' => "A baked pasta dish similar to baked macaroni, but made with spaghetti noodles and a tomato-based sauce with ground meat or sausage.",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "baked_spaghetti.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 1
            ],
            [
                'name' => 'Classic Pinoy Spaghetti',
                'description' => "A popular Filipino version of spaghetti, sweet and savory tomato-based sauce with ground meat, hotdogs, and sometimes liver spread, topped with grated cheese.",
                'price' => 850,
                'price_20pax' => 1700,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "classic_pinoy_spaghetti.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 1
            ],
            [
                'name' => 'Chicken Alfredo',
                'description' => "An Italian-American pasta dish made with fettuccine pasta, chicken, and a creamy sauce made with butter, cream, and parmesan cheese, often seasoned with garlic and parsley.",
                'price' => 950,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "chicken_alfredo.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 1
            ],
            [
                'name' => 'Spicy Shrimp Pesto',
                'description' => "A pasta dish made with linguine noodles, pesto sauce, and sautéed shrimp, spiced up with red pepper flakes.",
                'price' => 1000,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "spicy_shrimp_pesto.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 1
            ],
            [
                'name' => 'Pancit Malabon',
                'description' => "A Filipino noodle dish made with thick rice noodles, seafood, and a savory sauce made with shrimp paste, fish sauce, and annatto oil.",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "pancit_malabon.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 1
            ],
            [
                'name' => 'Classic Meatballs Spaghetti',
                'description' => "A classic Italian-American dish made with spaghetti noodles, meatballs made with a mixture of ground beef and pork, and a tomato-based sauce seasoned with garlic, onion, and herbs.",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "classic_meatballs_spaghetti.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 1
            ],
            [
                'name' => 'Oriental Stir-Fried Noodles',
                'description' => "A dish made with stir-fried egg noodles, vegetables, and protein (e.g., chicken, beef, shrimp) cooked with a variety of Asian seasonings such as soy sauce, oyster sauce, and sesame oil.",
                'price' => 850,
                'price_20pax' => 1700,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "oriental_stir_fried_noodles.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 1
            ],
            //Chicken/fish/seafood
            [
                'name' => 'Chicken Cordon Bleu w/ Garlic Cheese Sauce',
                'description' => "A dish made with chicken breast stuffed with ham and cheese, breaded and baked until golden, served with a garlicky cheese sauce.",
                'price' => 1000,
                'price_20pax' => 1950,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "chicken_cordon_bleu_w_garlic_cheese_sauce.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 3
            ],
            [
                'name' => 'Crispy Korean Honey Soy Chicken',
                'description' => "A Korean-inspired fried chicken dish coated in a sweet and savory honey soy sauce, with a crispy outer layer.",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "crispy_korean_honey_soy_chicken.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Chicken Fingers with 2 Special Sauce',
                'description' => "Deep-fried chicken tenders served with two dipping sauces, usually honey mustard and barbecue sauce.",
                'price' => 900,
                'price_20pax' => 1800,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "chicken_fingers_with_2_special_sauce.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Buttered Chicken in Parmesan Corn & Potatoes',
                'description' => "A dish made with pan-seared chicken in a buttery parmesan sauce served with roasted corn and potatoes.",
                'price' => 1000,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "buttered_chicken_in_parmesan_corn_and_potatoes.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Fish Stick in Sweet and Sour Sauce',
                'description' => "A dish made with breaded and fried fish sticks served with a tangy sweet and sour sauce.",
                'price' => 1000,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "fish_stick_in_sweet_and_sour_sauce.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Oriental Chicken Mushroom Stir-fry',
                'description' => "A dish made with stir-fried chicken and mushrooms in a savory oriental sauce, served over rice or noodles.",
                'price' => 1000,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "oriental_chicken_mushroom_stir_fry.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Fish Lumpia',
                'description' => "A Filipino version of spring rolls made with ground fish, vegetables, and spices wrapped in a thin wrapper and deep-fried until golden brown.",
                'price' => 1500,
                'price_20pax' => 2900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "fish_lumpia.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 3
            ],
            [
                'name' => 'Seafood Paella',
                'description' => "A Spanish rice dish made with saffron-seasoned rice, seafood (e.g., shrimp, mussels, squid), and vegetables, cooked in a paella pan.",
                'price' => 1500,
                'price_20pax' => 2900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "seafood_paella.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 3
            ],
            [
                'name' => 'Cajun Seafood',
                'description' => "A spicy seafood dish seasoned with Cajun spices, usually made with shrimp, crawfish, and/or crab.",
                'price' => 1500,
                'price_20pax' => 2900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "cajun_seafood.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 3
            ],
            //pork/beef
            [
                'name' => 'Crispy Pork Kare-Kare',
                'description' => "A Filipino dish made with crispy pork belly served with a peanut sauce made with vegetables and bagoong (shrimp paste).",
                'price' => 1000,
                'price_20pax' => 1950,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "crispy_pork_kare_kare.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 2
            ],
            [
                'name' => 'Pork Cordon Bleu',
                'description' => "A dish made with pork loin stuffed with ham and cheese, breaded and fried until crispy.",
                'price' => 850,
                'price_20pax' => 1600,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "pork_cordon_bleu.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 2
            ],
            [
                'name' => 'Beef with Broccoli',
                'description' => "A Chinese stir-fry dish made with sliced beef and broccoli cooked in a savory brown sauce made with soy sauce and oyster sauce.",
                'price' => 1200,
                'price_20pax' => 2300,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "beef_with_broccoli.jpg",
                'is_trending' => false,
                'is_featured' => true,
                'category_id' => 2
            ],
            [
                'name' => 'Beef Kare-Kare',
                'description' => "A Filipino stew made with tender beef, vegetables, and a thick peanut sauce, usually served with bagoong (shrimp paste).",
                'price' => 1200,
                'price_20pax' => 2300,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "beef_kare_kare.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 2
            ],
            [
                'name' => 'Lumpiang Shanghai',
                'description' => " A Filipino version of spring rolls made with ground pork or beef, vegetables, and spices wrapped in a thin wrapper and deep-fried until crispy.",
                'price' => 600,
                'price_20pax' => 1100,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "lumpiang_shanghai.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 2
            ],
            [
                'name' => 'Crispy Sweet and Sour Pork',
                'description' => "A Chinese dish made with crispy fried pork pieces coated in a sweet and sour sauce made with pineapple, bell peppers, and vinegar.",
                'price' => 1000,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "crispy_sweet_and_sour_pork.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 2
            ],
            //appetizer/side dish/dessert
            [
                'name' => 'Nacho Bake',
                'description' => "A layered baked dish made with tortilla chips, ground beef, cheese, and other toppings, typically served as an appetizer or snack.",
                'price' => 1000,
                'price_20pax' => 1900,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "nacho_bake.jpeg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 4
            ],
            [
                'name' => 'Oriental Stir-fried Mixed Veggies with Quail',
                'description' => "A dish made with stir-fried mixed vegetables and quail meat, cooked with a variety of Asian seasonings such as soy sauce and sesame oil.",
                'price' => 500,
                'price_20pax' => 1000,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "oriental_stir_fried_mixed_veggies_with_quail.jpg",
                'is_trending' => true,
                'is_featured' => false,
                'category_id' => 4
            ],
            [
                'name' => 'Thai Sticky Rice with Mango',
                'description' => "A Thai dessert made with glutinous rice cooked in coconut milk and served with sliced mango, often topped with a sweet syrup made with palm sugar.",
                'price' => 600,
                'price_20pax' => 1100,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "thai_sticky_rice_with_mango.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 4
            ],
            [
                'name' => 'Coffee Jelly',
                'description' => "A Japanese dessert made with coffee-flavored gelatin cubes served with whipped cream and milk.",
                'price' => 700,
                'price_20pax' => 1400,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "coffee_jelly.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 4
            ],
            [
                'name' => 'Mango Tapioca',
                'description' => "A Filipino dessert made with tapioca pearls cooked in coconut milk and served with fresh mangoes and a sweet syrup.",
                'price' => 700,
                'price_20pax' => 1400,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "mango_tapioca.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 4
            ],
            [
                'name' => 'Potato Salad',
                'description' => " A cold salad made with boiled potatoes, mayonnaise, and other ingredients such as celery, onions, and pickles, often served as a side dish.",
                'price' => 1000,
                'price_20pax' => 1950,
                'stock' => 20,
                'total_sold' => 0,
                'gallery' => "potato_salad.jpg",
                'is_trending' => false,
                'is_featured' => false,
                'category_id' => 4
            ],
        ]);
    }
}
