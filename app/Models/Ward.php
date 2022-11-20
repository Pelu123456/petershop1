<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = [
        'WARD_ID',
        'WARRD_NAME',
        'DISTRICT_ID'
];
    public function users(){
        return $this->hasMany(User::class);
    }
    public function district(){
        return $this->belongsTo(District::class , 'DISTRICT_ID');
    }
}
