<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'admin_id',
        'name',
        'image',
        'designation',
        'branch',
        'website',
        'linkedin',
        'order'
    ];
}
