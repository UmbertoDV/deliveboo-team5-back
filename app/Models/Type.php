<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'color', 'image'];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
    protected function getUpdatedAtAttribute($value){
        return date('d/m/Y H:i', strtotime($value));
    }
    protected function getCreatedAtAttribute($value){
        return date('d/m/Y H:i', strtotime($value));
    }
    public function getBadgeHTML(){
        return '<span class="badge" style="background-color:' . $this->color . '"> ' . $this->color .'</span>';
    }
}