<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetails extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'client_id',
        'referred_by_name',
        'referred_by_phone',
        'bank_account',
        'amc',
        'quotation_file',
    ];

}
