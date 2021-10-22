<?php

namespace Database\Factories;

use App\Models\trasection;
use Illuminate\Database\Eloquent\Factories\Factory;

class transectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = trasection::class;

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
