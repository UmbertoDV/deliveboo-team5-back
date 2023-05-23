<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'price', 'visibility', 'image'];

    public function orders()
    {
        return $this->belongsToMany(Order::class,'dish_order')->withPivot('quantity');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // ABSTRACT FUNCTION
    public function getAbstract($max = 90)
    {
        return substr($this->description, 0, $max) . "...";
    }

    protected function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
    // FUNZIONI PER FORMATTARE DATE- richiamo la funzione
    protected function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }

    public function getImageUri()
    {
        // dd($this->image);
        return $this->image ? asset('storage/' . $this->image) : "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png";
    }

    protected function getPriceAttribute($value)
    {
        return $this->attributes['price'] = number_format($value, 2);
    }
}
