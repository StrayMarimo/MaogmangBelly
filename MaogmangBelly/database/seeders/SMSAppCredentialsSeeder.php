<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SMSAppCredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sms_app_credentials')->insert([
            'id' => 1,
            'SHORTCODE_GLOBE' => '21662790',
            'SHORTCODE_CROSS' => '225642790',
            'APP_ID' => 'pn6xFapraoIx5cq5eATrkKIX9nybF5pd',
            'APP_SECRET' => '08254a6cf4e9e4fae89e6f2e967b5230ab0f18be5075cc9e7417c4b32aa530a4',
            'API_TYPE' => 'SMS',
            'APP_NAME' => 'Maogmang Belly'
        ]);
    }
}
