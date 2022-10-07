<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        Product::insert([
            [
                'title' => 'HDD 1TB',
                'price' => 74.09,
                'amount' => 55,
                'active' => true,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ],
            [
                'title' => 'HDD SSD 512GB',
                'price' => 190.99,
                'amount' => 102,
                'active' => true,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ],
            [
                'title' => 'RAM DDR4 16GB',
                'price' => 80.32,
                'amount' => 47,
                'active' => true,
                'created_at' => '2022-10-07 20:26:13',
                'updated_at' => '2022-10-07 20:26:13'
            ],
        ]);
    }
}
