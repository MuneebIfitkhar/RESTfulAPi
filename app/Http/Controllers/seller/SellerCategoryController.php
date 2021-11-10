<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\ApiController;
use App\Models\seller;
use Illuminate\Http\Request;

class SellerCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $categories = $seller->products()
        ->whereHas('categories')
        ->with('categories')
        ->get()
        ->pluck('categories')
        ->collapse()
        ->values();

        return $this->showAll($categories);
    }

    
}
