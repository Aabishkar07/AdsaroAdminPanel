<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    //
    protected $fillable = [
        'admin_id',
        'title',
        'featured_image',
        'order',
    ];
}
