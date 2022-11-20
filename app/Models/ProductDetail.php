<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'PRD_ID',
        'PRD_TYPE',
        'PR_ID',
    ];
    public function product(){
        return $this->belongsTo(Product::class,'PR_ID');
    }
}
