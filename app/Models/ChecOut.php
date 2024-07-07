<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'price',
        'country',
        'firstname',
        'secoundname',
        'adress',
        'city',
        'postalcode',
        'phone',
        'save',
        'quantity',
        'status',
        // Add any other fields that should be mass assignable
    ];
}
