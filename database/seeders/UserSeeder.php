<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'full_name' => 'Admin User',
            'email' => 'admin@educart.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'full_name' => 'Student User',
            'email' => 'student@educart.com',
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]);
    }
}
