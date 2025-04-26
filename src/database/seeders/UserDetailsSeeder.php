<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailsSeeder extends Seeder
{
    public function run()
    {
        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            UserDetail::create([
                'user_id' => $user->id,
                'contact_info' => $this->generateContactInfo($user),
                'age' => $user->role_id == 4 ? rand(18, 80) : null,
                'gender' => $user->role_id == 4 ? $this->randomGender() : null,
                //'area_id' => $user->role_id != 3 ? rand(1, 10) : null,
                'interests' => $user->role_id == 4 ? $this->randomInterests() : null,
                'address' => $user->role_id == 3 ? $this->businessAddress() : null,
                'logo' => $user->role_id == 3 ? 'business-logos/default.png' : null,
            ]);
        }
    }

    protected function generateContactInfo($user)
    {
        return match($user->role_id) {
            3 => '+1'.rand(200, 999).rand(200, 999).rand(1000, 9999),
            default => '+1'.rand(200, 999).rand(200, 999).rand(1000, 9999),
        };
    }

    protected function randomGender()
    {
        return ['male', 'female', 'other'][rand(0, 2)];
    }

    protected function randomInterests()
    {
        $interests = ['Sports', 'Music', 'Reading', 'Travel', 'Cooking', 'Gardening'];
        shuffle($interests);
        return implode(', ', array_slice($interests, 0, rand(1, 3)));
    }

    protected function businessAddress()
    {
        $streets = ['Main St', 'First Ave', 'Commerce Blvd', 'Market St'];
        return rand(100, 999).' '.$streets[array_rand($streets)].', City, State '.rand(10000, 99999);
    }
}
