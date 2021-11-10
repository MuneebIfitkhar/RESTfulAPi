<?php

namespace App\Http\Controllers\categories;

use App\Http\Controllers\ApiController;
use App\Models\categories;
use Illuminate\Http\Request;

class CategoryTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categories $category)
    {
        $transactions= $category->products()
        ->whereHas('transactions')
        ->with('transactions')
        ->get()
        ->pluck('transactions')
        ->collapse();

        return $this->showAll($transactions);
    }

    
}
