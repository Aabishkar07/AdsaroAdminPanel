<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaPage extends Model
{
    protected $fillable = [ 
        'page_name',
        'meta_title',
        'meta_description',
        'img_alt',
        'keywords',
        'ogimage'
    ];
}
