<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'admin_id',
        'title',
        'slug',
        'image',
        'icon',
        'description',
        'long_description',
        'meta_title',
        'meta_description',
        'img_alt',
        'keywords',
        'order'
    ];
}
