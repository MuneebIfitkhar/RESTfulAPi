<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Transaction;
use App\Scopes\BuyerScope; 


class buyer extends User
{
    use HasFactory;

    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
