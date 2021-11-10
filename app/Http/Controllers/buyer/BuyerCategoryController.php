<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\ApiController;
use App\Models\buyer;
use Illuminate\Http\Request;
use App\Models\categories;

class BuyerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $seller = $buyer->transactions()->with('product.categories')
                    ->get()
                    ->pluck('product.categories')
                    ->collapse()
                    ->unique('id')
                    ->values();

        return $this->showAll($seller);
    }

   
}
