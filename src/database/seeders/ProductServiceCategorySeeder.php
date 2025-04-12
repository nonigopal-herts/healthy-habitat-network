<?php

namespace Database\Seeders;

use App\Models\ProductServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productServiceCategories = [
            [
                'product_service_types_id' => 1,
                'name' => 'Healthy Eating Programs',
                'description' => 'Healthy Eating Programs',
            ],
            [
                'product_service_types_id' => 1,
                'name' => 'Fitness and Wellness',
                'description' => 'Fitness and Wellness',
            ],
            [
                'product_service_types_id' => 1,
                'name' => 'Sustainable Living',
                'description' => 'Sustainable Living',
            ],
            [
                'product_service_types_id' => 1,
                'name' => 'Mindfulness and Mental Health',
                'description' => 'Mindfulness and Mental Health',
            ],
            [
                'product_service_types_id' => 2,
                'name' => 'Reusable Health Products',
                'description' => 'Reusable Health Products',
            ],
            [
                'product_service_types_id' => 2,
                'name' => 'Eco-Friendly Fitness Gear',
                'description' => 'Eco-Friendly Fitness Gear',
            ],
            [
                'product_service_types_id' => 2,
                'name' => 'Organic Personal Care Products',
                'description' => 'Organic Personal Care Products',
            ],
            [
                'product_service_types_id' => 2,
                'name' => 'Home Wellness Products',
                'description' => 'Home Wellness Products',
            ],
        ];

        foreach ($productServiceCategories as $category) {
            ProductServiceCategory::create($category);
        }
    }
}
