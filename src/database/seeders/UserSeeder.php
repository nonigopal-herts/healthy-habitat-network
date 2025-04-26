<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Assuming you have constants in User model
        ]);

        // Create council user
        User::create([
            'name' => 'Council Member',
            'email' => 'council@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        // Create business user
        User::create([
            'name' => 'Business Owner',
            'email' => 'business@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);

        // Create resident user
        User::create([
            'name' => 'Community Resident',
            'email' => 'resident@example.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
        ]);

        // Create multiple random users
        User::factory()
            ->count(10)
            ->create();
    }
}
