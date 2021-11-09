<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\ApiController;
use App\Models\buyer;
use Illuminate\Http\Request;

class BuyerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transactions;

return $this->showAll($transactions);
    }

}
