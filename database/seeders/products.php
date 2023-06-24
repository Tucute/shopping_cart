<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
            'name' => 'Pure Pineapple',
            'price' => 14000,
            'image' => 'product-1.jpg',
            'type' => 'TOWEL',
            ],
            [
                'name' => 'Guangzhou sweater',
                'price' => 13000,
                'image' => 'product-2.jpg',
                'type' => 'COAT',
            ],
            [
                'name' => 'Guangzhou sweater',
                'price' => 34000,
                'image' => 'product-3.jpg',
                'type' => 'SHOES',
            ],
            [
                'name' => 'Microfiber Wool Scarf',
                'price' => 64000,
                'image' => 'product-4.jpg',
                'type' => 'COAT',
            ],
            [
                'name' => 'Mens Painted Hat',
                'price' => 44000,
                'image' => 'product-5.jpg',
                'type' => 'SHOES',
            ],
            [
                'name' => 'Converse Shoes',
                'price' => 64000,
                'image' => 'product-6.jpg',
                'type' => 'SHOES',
            ],
            [
                'name' => 'Pure Pineapple',
                'price' => 34000,
                'image' => 'product-7.jpg',
                'type' => 'TOWEL',
            ],
            [
                'name' => '2 Layer Windbreaker',
                'price' => 44000,
                'image' => 'product-8.jpg',
                'type' => 'COAT',
            ],
            [
                'name' => 'Converse Shoes',
                'price' => 34000,
                'image' => 'product-9.jpg',
                'type' => 'SHOES',
            ],
        ]);
    }
}
