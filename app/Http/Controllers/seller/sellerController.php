<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\product;

class sellerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::has('product')->get();

        return $this->showAll($sellers);
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sellers = Seller::has('product')->findorfail($id);

        return $this->showOne($sellers);
    }

   
}
