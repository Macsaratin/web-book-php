<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function shopcategory(){
        return view("shop.category.categories");
    }
    public function admincategory(){
        return view("admin.category.list");
    }
}
