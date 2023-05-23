<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDish extends Pivot
{
    protected $table = 'dish_order';

    protected $fillable = ['order_id', 'dish_id', 'quantity'];
}
