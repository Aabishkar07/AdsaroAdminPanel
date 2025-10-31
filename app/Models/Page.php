<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
        protected $fillable = [
        'title',
        'description',
        'main_image',
        'secondary_image',
        'secondary_description',
        'third_description',
        'third_image',
        'fourth_description'

    ];
}
