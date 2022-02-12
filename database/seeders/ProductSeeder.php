<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'LARAVEL',
            'cost' => 200,
            'price' => 350,
            'barcode' => '755478596',
            'stok' => 1000,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);

        Product::create([
            'name' => 'SAPATO NIKE DE CORRIDA',
            'cost' => 650,
            'price' => 1500,
            'barcode' => '785429641',
            'stok' => 638,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'tenis.png'
        ]);

        Product::create([
            'name' => 'IPHONE 13',
            'cost' => 10000,
            'price' => 13000,
            'barcode' => '256325854',
            'stok' => 432,
            'alerts' => 10,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);

        Product::create([
            'name' => 'DESKTOP',
            'cost' => 6000,
            'price' => 7500,
            'barcode' => '9956423301',
            'stok' => 200,
            'alerts' => 6,
            'category_id' => 1,
            'image' => 'curso.png'
        ]);
    }
}