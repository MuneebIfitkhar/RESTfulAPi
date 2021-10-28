<?php

namespace Database\Factories;

use App\Models\trasaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class transactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = trasaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $seller = Seller::has('product')->get()->random();
        $buyer = User::all()->except($seller->id)->random();

        return [
            'quantity' =>$faker->numberBetween(1,3),
            'buyer_id' => $buyer->id,
            'product_id' => $seller->product->random()->id,
        ];
    }
}
