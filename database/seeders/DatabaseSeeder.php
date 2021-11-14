<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Transaction;
use App\Database\Factories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        User::truncate();
        Categories::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('categories_product')->truncate();

        
        $usersQuantity = 1000;
        $categoryQuantity = 30;
        $productQuantity = 1000;
        $transactionQuantity = 1000;

       
        User::factory()->times($usersQuantity)->create();
       
       
        Categories::factory()->times($categoryQuantity)->create();
        
        Product::factory()->times($productQuantity)->create()->each
        (
            function ($product)
            {
                $categories = Categories::all()->random(mt_rand(1,5))->pluck('id');
                 

                $product->categories()->attach($categories);
            }
        );
    
       Transaction::factory()->times($transactionQuantity)->create();
    }
   

}
