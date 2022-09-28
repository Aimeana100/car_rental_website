<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];


    public function car(){
        return $this->belongsToMany(Car::class, 'car_feature', 'feature_id', 'car_id');
    }
}
