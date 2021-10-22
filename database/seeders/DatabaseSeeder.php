<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use App\Models\categories;
use App\Models\product;
use App\Models\transection;
use App\Database\Factories;


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
        Transection::truncate();
        DB::table('category_product')->truncate();

        
        $usersQuantity = 200;
        $categoryQuantity = 30;
        $productQuantity = 1000;
        $transectionQuantity = 1000;

       
        User::factory()->times($usersQuantity)->create();
       
       Product::factory()->times($productQuantity)->create()->each(
            function ($product){
                $categories = Categories::all()->random(mt_rand(1,5))->pluck('id');
                
                $product = Categories()->attach($categories);
            });
    
        factory(Transection::class ,$transectionQuantity)->create();
    }
   

}
