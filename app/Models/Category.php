<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [   //mass data assignment ko lagi use hunxa
        'category_name',
        'category_desc',
        
    ];

    public function products(){
        //hasOne,hasMany,bolongsTo,belongsToMany
        return $this->hasMany(Product::class);
    }
}
