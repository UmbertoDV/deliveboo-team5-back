<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id', 'address', 'email', 'telephone', 'description', 'p_iva', 'image'];

    // protected $with = ['type'];

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getAbstract($max = 50)
    {
        return substr($this->description, 0, $max) . "...";
    }

    public function getImageUri()
    {
        return $this->image ? asset('storage/' . $this->image) : "https://picsum.photos/200";
    }
}