<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'DISTRICT_ID',
        'DISTRICT_NAME',
        'PROVINCE_ID'
    ];
    public function wards(){
        return $this->hasMany(Ward::class);
    }
    public function province(){
        return $this->belongsTo(Province::class, 'PROVINCE_ID');
    }
}
