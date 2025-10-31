<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
     use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'project_name',
        'start_date',
        'due_date',
        'status',
        'deal_done',
        'percentage',
        'priority',
        'remarks',
        'amc_price',
        'project_commission',
        'project_price',
        'final_price',
        'reference_website',
        'quotation_file'
    ];
       public function clientDetail()
    {
        return $this->hasOne(ClientDetails::class);
    }
}
