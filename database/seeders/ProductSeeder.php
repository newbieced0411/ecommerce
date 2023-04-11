<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([   
            'name' => 'Black T-Shirt',
            'description' => 'Classic black t-shirt, made with high quality cotton material.',
            'price' => 19.99,
            'stock' => 50
        ]);
        Product::create([   
            'name' => 'White Hoodie',
            'description' => 'Comfortable and stylish white hoodie with adjustable drawstrings.',
            'price' => 39.99,
            'stock' => 25
        ]);
        Product::create([   
            'name' => 'Leather Wallet',
            'description' => 'Sleek and durable leather wallet, with multiple card slots and a zippered coin pocket.',
            'price' => 29.99,
            'stock' => 10
        ]);
        Product::create([   
            'name' => 'Smartwatch',
            'description' => 'Advanced smartwatch with fitness tracking, GPS, and heart rate monitoring features.',
            'price' => 149.99,
            'stock' => 5
        ]);
        Product::create([   
            'name' => 'Wireless Headphones',
            'description' => 'Premium wireless headphones with noise-cancellation and Bluetooth connectivity.',
            'price' => 129.99,
            'stock' => 15
        ]);
        Product::create([   
            'name' => 'Gaming Keyboard',
            'description' => 'Mechanical gaming keyboard with customizable RGB lighting and programmable macro keys.',
            'price' => 89.99,
            'stock' => 8
        ]);
        Product::create([   
            'name' => 'Gaming Mouse',
            'description' => 'Ergonomic gaming mouse with high-precision optical sensor and customizable DPI settings.',
            'price' => 49.99,
            'stock' => 12
        ]);
        Product::create([   
            'name' => 'Laptop Bag',
            'description' => 'Stylish and durable laptop bag with multiple compartments and a padded interior.',
            'price' => 34.99,
            'stock' => 20
        ]);
        Product::create([   
            'name' => 'Portable Charger',
            'description' => 'Compact and powerful portable charger with multiple USB ports and fast charging technology.',
            'price' => 24.99,
            'stock' => 10
        ]);
        Product::create([   
            'name' => 'Wireless Speaker',
            'description' => 'High-fidelity wireless speaker with Bluetooth and Wi-Fi connectivity, and voice assistant support.',
            'price' => 199.99,
            'stock' => 3
        ]);
    }
}
