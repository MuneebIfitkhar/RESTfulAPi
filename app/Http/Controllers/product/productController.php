<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;


class productController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return $this->showAll($products);
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
      return $this->showOne($product);
    }
}
