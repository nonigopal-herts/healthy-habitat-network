<?php

namespace Database\Seeders;

use App\Models\ProductServiceSubcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductServiceSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productServiceSubcategories = [
            [
                'product_service_category_id' => 1,
                'name' => 'Nutrition Counseling',
                'description' => 'Nutrition Counseling',
            ],
            [
                'product_service_category_id' => 1,
                'name' => 'Organic Meal Delivery',
                'description' => 'Organic Meal Delivery',
            ],
            [
                'product_service_category_id' => 2,
                'name' => 'Yoga and Meditation Classes',
                'description' => 'Yoga and Meditation Classes',
            ],
            [
                'product_service_category_id' => 2,
                'name' => 'Personal Training Services',
                'description' => 'Personal Training Services',
            ],
            [
                'product_service_category_id' => 3,
                'name' => 'Eco-Friendly Home Cleaning',
                'description' => 'Eco-Friendly Home Cleaning',
            ],
            [
                'product_service_category_id' => 3,
                'name' => 'Sustainable Gardening',
                'description' => 'Sustainable Gardening',
            ],
            [
                'product_service_category_id' => 4,
                'name' => 'Counselling and Therapy',
                'description' => 'Counselling and Therapy',
            ],
            [
                'product_service_category_id' => 4,
                'name' => 'Stress Management Workshops',
                'description' => 'Stress Management Workshops',
            ],

            //Product Categories
            [
                'product_service_category_id' => 5,
                'name' => 'Stainless Steel Straws',
                'description' => 'Stainless Steel Straws',
            ],
            [
                'product_service_category_id' => 5,
                'name' => 'Reusable Face Masks',
                'description' => 'Reusable Face Masks',
            ],
            [
                'product_service_category_id' => 6,
                'name' => 'Cork Yoga Mats',
                'description' => 'Cork Yoga Mats',
            ],
            [
                'product_service_category_id' => 6,
                'name' => 'Bamboo Fiber Towels',
                'description' => 'Bamboo Fiber Towels',
            ],
            [
                'product_service_category_id' => 7,
                'name' => 'Natural Deodorants',
                'description' => 'Natural Deodorants',
            ],
            [
                'product_service_category_id' => 7,
                'name' => 'Plant-Based Skincare',
                'description' => 'Plant-Based Skincare',
            ],
            [
                'product_service_category_id' => 8,
                'name' => 'Air Purifiers with HEPA Filters',
                'description' => 'Air Purifiers with HEPA Filters',
            ],
            [
                'product_service_category_id' => 8,
                'name' => 'Organic Bedding',
                'description' => 'Organic Bedding',
            ],

        ];

        foreach ($productServiceSubcategories as $subcategory) {
            ProductServiceSubcategory::create($subcategory);
        }
    }
}
