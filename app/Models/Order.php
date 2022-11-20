<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'ORDER_ID',
        'ORDER_TOTAL',
        'ORDER_PHONE',
        'ORDER_ADRESS',
        'USER_ID'
    ];
    public function User(){
        return $this->belongsTo(User::class, 'USER_ID');
    }
    public function ordersDetails(){
        return $this->hasMany(OrderDetail::class);
    }
    
}
