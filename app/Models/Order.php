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
        return $this->belongsToMany(Dish::class);
    }
}
