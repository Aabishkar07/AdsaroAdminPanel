<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = [
        'admin_id',

        'title',
        'banner_order',
        'banner_image',
        'slug',
    ];
}
