<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'car_id',
        'orderDate',
        'email',
        'telphone',
        'pickup_place',
        'pickoff_place',
        'pickup_date',
        'pickup_time',
        'pickoff_time',
        'pickoff_time'
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
