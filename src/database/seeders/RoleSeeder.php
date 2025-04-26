<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'description' => 'System Admin',
            ],
            [
                'name' => 'council',
                'description' => 'Councils of different areas of the platform',
            ],
            [
                'name' => 'business',
                'description' => 'Small and medium enterprises (SMEs) of the platform',
            ],
            [
                'name' => 'resident',
                'description' => 'Residents of the platform',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
