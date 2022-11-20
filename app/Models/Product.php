<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'PR_ID',
        'PR_NAME',
        'PR_COLOR',
        'PR_STOCK',
        'PR_PRICE',
        'PR_TYPE',
        'PR_NOTE',
        'PR_PIC',
    ];

    public function orderDetails(){
        return $this->hasMany(orderDetails::class);
    }
}


