<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $table = 'category';
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
