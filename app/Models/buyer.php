<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\transection;

class buyer extends user
{
    use HasFactory;

    public function transection()
    {
        return $this->hasMany(Transection::class);
    }

}
