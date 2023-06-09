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
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'pasta'
            ],
            [
                'id' => 2,
                'name' => 'pork | beef'
            ],
            [
                'id' => 3,
                'name' => 'chicken | fish | seafood'
            ],
            [
                'id' => 4,
                'name' => 'appetizer | side dish | dessert'
            ],
        ]);
    }
}
