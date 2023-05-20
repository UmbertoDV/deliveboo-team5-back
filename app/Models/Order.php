<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'surname', 'email', 'address', 'telephone', 'note', 'status', 'total'];
    public function dishes()
    {
        return $this->belongsToMany(Dish::class)
            ->withPivot('quantity');
    }

    public function totalPrice()
    {
        $price = 0;
        foreach ($this->dishes as $dish) {
            for ($i = 0; $i < $dish->pivot->quantity; $i++) {
                $price += $dish->price;
            }
        }
        return $price;
    }
}
