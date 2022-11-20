<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'OD_ID',
        'OD_QUANTITY',
        'ORDER_ID',
        'FS_ID',
        'FOOD_ID',
        'ACC_ID',
        'PET_ID'
    ];
    public function Order(){
        return $this->belongsTo(Order::class,'OERDER_ID');
    }
    public function Fashion(){
        return $this->belongsTo(Fashion::class,'FS_ID');
    }
    public function Accessory(){
        return $this->belongsTo(Accessory::class,'ACC_ID');
    }
    public function Pet(){
        return $this->belongsTo(Pet::class,'Pet_ID');
    }
    public function Food(){
        return $this->belongsTo(Food::class,'FOOD_ID');
    }
}
