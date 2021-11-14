<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\ApiController;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\Categories;


class ProductCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $categories = $product->categories;

        return $this->showAll($categories);
        
    }

   
    public function update(Request $request, product $product ,Categories $category)
    {
        //attach  ,  sync , syncwithoutDetach
        $product ->categories()->syncwithoutDetaching([$category->id]);

        return $this->showAll($product->categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product , Categories $category)
    {
    if (!$product->categories()->find($category->id)) {
        return $this->errorResponse('This Specified category Is Note a Category of this Product' , 404);
    }

        $product->categories()->detach($category->id);

        return $this->showAll($product->categories);
    }
}
