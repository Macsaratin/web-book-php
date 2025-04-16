<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;    
    protected $table = "categories";
    //
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function parent(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    protected $fillable = ['category_name', 'slug', 'status', 'parent_id', 'sort_order', 'description', 'image'];
}
