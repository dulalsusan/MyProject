<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public function products(){
        //hasOne,hasMany,belongsTo,belongsToMany
        // return $this->hasOne(Product::class,'product_id');
        return $this->belongsTo(Product::class,'product_id');
    }

    public function orders(){
        //hasOne,hasMany,belongsTo,belongsToMany
        return $this->hasOne(Order::class,'order_id');
        // return $this->belongsTo(Order::class,'order_id');
    }
}
