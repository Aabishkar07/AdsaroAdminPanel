<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductEnquire extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'number',
        'message',
        'product_id'

    ];

    public function productname(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
