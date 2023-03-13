<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dummy Data
        DB::table('users')->insert([
            [
                'name' => 'roronoa zoro',
                'email' => 'marimo@email.com',
                'mobile_number' => 9613730468,
                'password' => Hash::make('12345'),
                'user_type' => 'C'
            ],
            [
                'name' => 'angeline basbas',
                'email' => 'angeline@gmail.com',
                'mobile_number' => 9613730468,
                'password' => Hash::make('12345'),
                'user_type' => 'A'
            ]
        ]);
    }
}
