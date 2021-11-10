<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates =['deleted_at'];
    protected $fillable = [
        'name', 
        'description',
    ];
    protected $hidden =['pivot'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
