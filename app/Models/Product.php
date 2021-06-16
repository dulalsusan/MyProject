<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'price',
        'category_id',
    ];
    protected $attributes=[
        'image' => '',
    ];

    public function cat(){
        //hasOne,hasMany,belongsTo,belongsToMany
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(){
        //hasOne,hasMany,belongsTo,belongsToMany
        return $this->belongsTo(User::class,'user_id');
    }

    
    
}
