<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@trivora.local')],
            [
                'name' => env('ADMIN_NAME', 'Administrator'),
                'password' => env('ADMIN_PASSWORD', 'password'),
            ],
        );
    }
}
