<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;



class HomeController extends Controller
{
    public function index() {
        $banners = Banner::where('status', [1])->get();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('parent')
        ->where('status', 1)
        ->take(6)
        ->get();
        $products = Product::where('status', 1)->take(8)->get();
        $saleProducts = Product::where('is_on_sale', true)->whereIn('status', [1])->take(8)->get();
    
        return view("shop.home.home", compact('products', 'saleProducts', 'categories', 'banners' , 'brands'));
    }
    
}
