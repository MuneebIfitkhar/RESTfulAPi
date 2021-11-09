<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\transaction;

class buyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $buyers = Buyer::has('transactions')->get();
      
        return $this->showAll($buyers);
    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buyer = Buyer::has('transactions')->findorfail($id);

        return $this->showOne($buyer);
    }

    
}
