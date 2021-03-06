<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\ApiController;
use App\Models\buyer;
use Illuminate\Http\Request;

class BuyerSellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $seller = $buyer->transactions()->with('product.seller')->get()->pluck('product.seller')->unique('id')->values();

        return $this->showAll($seller);
    }

}
