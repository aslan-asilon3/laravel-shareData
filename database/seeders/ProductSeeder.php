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
            'name'=>'baju1',
            'price'=>'1',
            'stock'=>'1',
            'buy'=>'1',
            'sell'=>'1',
            'status'=>'onsale',
            'description'=>'onsale',
        ]);
        
        Product::create([
            'name'=>'baju2',
            'price'=>'2',
            'stock'=>'2',
            'buy'=>'2',
            'sell'=>'2',
            'status'=>'onsale2',
            'description'=>'onsale2',
        ]);
    }
}
