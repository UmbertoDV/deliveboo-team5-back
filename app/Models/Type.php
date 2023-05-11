<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'image'];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
