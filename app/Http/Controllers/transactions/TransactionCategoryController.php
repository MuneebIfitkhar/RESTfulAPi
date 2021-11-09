<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\ApiController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Categories;

class TransactionCategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Transaction $transaction)
    {
         $categories = $transaction->product->categories;

         return $this->showAll($categories);

    }

}
