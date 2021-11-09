<?php

namespace App\Http\Controllers\transactions;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\Transaction;

class transactionsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();

        return $this->showAll($transactions);
    }

    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }

}
