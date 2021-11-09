<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\ApiController;
use App\Models\buyer;
use Illuminate\Http\Request;
use App\Models\Product;

class BuyerProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $product = $buyer->transactions()->with('product')->get()->pluck('product');

        return $this->showAll($product);
    }

}
