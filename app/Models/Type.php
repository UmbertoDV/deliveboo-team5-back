<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Type extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    public $sortable = ['id', 'name', 'created_at', 'updated_at'];
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
    public function getImageUri(){
        return $this->image ? url('storage/'. $this->image) : "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png";
    }
}