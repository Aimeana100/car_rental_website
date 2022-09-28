<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'transmission',
        'luggage',
        'seats',
        'model',
        'per_hour',
        'per_day',
        'per_month',
        'description',
        'category_id',
        'status'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function feature(){
        return $this->belongsToMany(Feature::class, 'car_feature', 'car_id', 'feature_id');
    }
    public function order(){
        return $this->hasMany(Order::class);
    }

}
