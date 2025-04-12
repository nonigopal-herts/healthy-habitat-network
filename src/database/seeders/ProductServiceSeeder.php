<?php

namespace Database\Seeders;

use App\Models\ProductServiceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'product',
                'description' => 'Product Type',
            ],
            [
                'name' => 'service',
                'description' => 'Service Type',
            ],
        ];

        foreach ($types as $type) {
            ProductServiceType::create($type);
        }
    }
}
