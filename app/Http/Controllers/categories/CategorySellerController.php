<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\ApiController;
use App\Models\categories;
use Illuminate\Http\Request;

class CategorySellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $category)
    {
        $sellers = $category->products()
        ->with('seller')
        ->get()
        ->pluck('seller')
        ->unique()
        ->values();

         return $this->showAll($sellers);
    }

   
}
