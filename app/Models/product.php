<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    const AVAILABLE_PRODUCT = 'available';
    const UNAVLABLE_PRODUCT = 'unavailable';

    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
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
        return $this->belongsToMany(Categories::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
