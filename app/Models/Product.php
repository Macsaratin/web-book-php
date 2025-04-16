<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $table="products";
    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
        'category_id',
        'brand_id',
        'price',
        'pricesale',
        'qty',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }   
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }   
    
    
    
}
