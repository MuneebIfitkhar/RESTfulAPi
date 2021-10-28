<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\product; 


class seller extends User
{
    use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
