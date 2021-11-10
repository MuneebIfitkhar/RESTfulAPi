<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\ApiController;
use App\Models\categories;
use Illuminate\Http\Request;

class CategoryProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $category)
    {
        $products = $category->products;

        return $this->showAll($products);
    }

}
