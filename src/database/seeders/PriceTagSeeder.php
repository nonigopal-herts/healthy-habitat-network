<?php

namespace Database\Seeders;

use App\Models\PriceTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priceTags = [
            [
                'name' => 'affordable',
                'description' => 'affordable products',
            ],
            [
                'name' => 'moderate',
                'description' => 'moderate products',
            ],
            [
                'name' => 'premium',
                'description' => 'premium products',
            ],
        ];

        foreach ($priceTags as $tag) {
            PriceTag::create($tag);
        }
    }
}
