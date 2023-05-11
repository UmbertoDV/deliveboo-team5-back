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
        return $this->belongsToMany(Order::class);
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

    protected function getCreatedAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
    // FUNZIONI PER FORMATTARE DATE- richiamo la funzione
    public function getUpdatedAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->updated_at));
    }

    public function getImageUri()
    {
        return $this->image ? url('storage/' . $this->image) : 'https://picsum.photos/200';
    }
}
