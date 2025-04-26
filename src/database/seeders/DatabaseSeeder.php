<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);


        //Call seeder in proper oder
        $this->call([
            RoleSeeder::class,
            AreaSeeder::class,
            UserSeeder::class,
            UserDetailsSeeder::class,
            ProductServiceSeeder::class,
            ProductServiceCategorySeeder::class,
            ProductServiceSubcategorySeeder::class,
            PriceTagSeeder::class,
        ]);
    }
}
