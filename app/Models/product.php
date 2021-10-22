<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVLABLE_PRODUCT = 'unavailable';

    use HasFactory;
    protected $fillable =[
         'name',
         'descriotion',
         'status',
         'image',
         'seller_id',
    ];

    public function isAvailable()
    {
        return $this->status == Product::AVAILABLE_PRODUCT;
    }

    public function categories() 
    {
        return $thsi->belongsToMany(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transections()
    {
        return $this->hasMany(Transection::class);
    }
}
