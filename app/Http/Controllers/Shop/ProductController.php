<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with(['category', 'brand'])
            ->select(
                'id',
                'name',
                'slug',
                'image',
                'description',
                'status',
                'category_id',
                'brand_id',
                'price',
                'is_on_sale',
                'discount',
                'pricesale',
                'qty'
            )
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view("shop.product.products", compact('products'));
    }

    public function ProductByCategory($slug) {
        $category = Category::where('slug', $slug)->first();
        
        if (!$category) {
            return redirect()->route('shop.product.products')->with('error', 'Danh mục không tồn tại.');
        }
        
        $products = Product::with(['category', 'brand'])
            ->where('category_id', $category->id)
            ->where('status', 1) 
            ->orderBy('created_at', 'desc')
            ->get();
        
        $categories = Category::whereNull('parent_id')->take(4)->get();
        return view("shop.category.categories", compact('products', 'categories', 'category'));
    }
    public function ProductByBrand($slug) {
        $brand = Brand::where('slug', $slug)->first();

        if (!$brand) {
            return redirect()->route('shop.product.products')->with('error', 'Thương hiệu không tồn tại.');
        }

        $products = Product::with(['category', 'brand'])
            ->where('brand_id', $brand->id)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $brands = Brand::where('status', 1)->get();
        return view("shop.brand.brands", compact('products', 'brands', 'brand'));
    }

    public function ProductDetail($slug) {
        $product = Product::with(['category', 'brand'])->where('slug', $slug)->first();
    
        if (!$product) {
            return redirect()->route('shop.product.products')->with('error', 'Sản phẩm không tồn tại.');
        }
            $relatedByCategory = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id) 
            ->where('status', 1)
            ->take(4)
            ->get();
    
        $relatedByBrand = Product::where('brand_id', $product->brand_id)
            ->where('id', '!=', $product->id) 
            ->where('status', 1)
            ->take(4)
            ->get();
    
        return view('shop.product.detail', compact('product', 'relatedByCategory', 'relatedByBrand'));
    }

    public function getSaleProducts() {
        $saleProducts = Product::with(['category', 'brand'])
            ->where('is_on_sale', true) 
            ->where('status', 1)
            ->orderBy('discount', 'desc')
            ->get();

        return view('shop.product.productsale', compact('saleProducts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return redirect()->route('shop.product.products')->with('error', 'Please enter a search query!');
        }
            $products = Product::with(['category', 'brand'])
            ->where('name', 'LIKE', "%$query%")
            ->where('status', 1)
            ->paginate(10);
    
        return view('shop.product.seach', compact('products', 'query'));
    }
    
}
