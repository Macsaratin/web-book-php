<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            ->where('status', '!=',0, )
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        $categories = Category::all();
        $htmlcategoryid = '';
        foreach ($categories as $category) {
            $htmlcategoryid .= "<option value='{$category->id}'>{$category->category_name}</option>";
        }
    
        $brands = Brand::all();
        $htmlbrandid = '';
        foreach ($brands as $brand) {
            $htmlbrandid .= "<option value='{$brand->id}'>{$brand->brand_name}</option>";
        }
    
        return view("admin.product.list", compact('products', 'htmlcategoryid', 'htmlbrandid'));
    }
    
    public function trashList()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $trashProducts = Product::where('status', '=', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.product.trash', compact('trashProducts', 'categories', 'brands'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
    
        $htmlcategoryid = '';
        $htmlbrandid = '';
        $parentCategories = $categories->where('parent_id', null);
        $childCategories = $categories->whereNotNull('parent_id'); 
    
        foreach ($brands as $brand) {
            $htmlbrandid .= "<option value='{$brand->id}'>{$brand->name}</option>";
        }
    
        foreach ($parentCategories as $parent) {
            $htmlcategoryid .= "<optgroup label='{$parent->category_name}'>";
    
            foreach ($childCategories as $child) {
                if ($child->parent_id == $parent->id) {
                    $htmlcategoryid .= "<option value='{$child->id}'>-- {$child->category_name}</option>";
                }
            }
    
            $htmlcategoryid .= "<option value='{$parent->id}'>{$parent->category_name}</option>";
    
            $htmlcategoryid .= "</optgroup>";
        }
    
        return view('admin.product.create', compact('categories', 'brands', 'htmlcategoryid', 'htmlbrandid'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->is_on_sale = $request->has('is_on_sale') ? 1 : 0;
        $product->discount=$request->discount;
        $product->price = $request->price;
        if ($product->is_on_sale) {
            $discount = $product->discount ?? 0;
            $product->pricesale = $product->price - ($product->price * $discount / 100);
        } else {
            $product->pricesale = $product->price;
        }
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->created_at = now();
        $product->created_by = Auth::id() ?? 1;
        $product->updated_by = Auth::id() ?? 1;
        $product->status = $request->status;
    
        $product->save();
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('imagebook/product'), $filename);
            $product->image = 'imagebook/product/' . $filename;
        }
    
        $product->save();
    
        return redirect()->route('admin.product.list')->with('success', 'Product added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with(['category', 'brand'])->findOrFail($id);
    
        return view('admin.product.show', compact('product'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
    
        $htmlcategoryid = '';
        $htmlbrandid = '';
        $parentCategories = $categories->where('parent_id', null);
        $childCategories = $categories->whereNotNull('parent_id');
    
        foreach ($brands as $brand) {
            $htmlbrandid .= "<option value='{$brand->id}'" . ($product->brand_id == $brand->id ? ' selected' : '') . ">{$brand->name}</option>";
        }
    
        foreach ($parentCategories as $parent) {
            $htmlcategoryid .= "<optgroup label='{$parent->category_name}'>";
            foreach ($childCategories as $child) {
                if ($child->parent_id == $parent->id) {
                    $selected = ($product->category_id == $child->id) ? 'selected' : '';
                    $htmlcategoryid .= "<option value='{$child->id}' {$selected}>-- {$child->category_name}</option>";
                }
            }
            $selectedParent = ($product->category_id == $parent->id) ? 'selected' : '';
            $htmlcategoryid .= "<option value='{$parent->id}' {$selectedParent}>{$parent->category_name}</option>";
            $htmlcategoryid .= "</optgroup>";
        }
    
        return view('admin.product.edit', compact('product', 'htmlcategoryid', 'htmlbrandid'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
    
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->discount=$request->discount;

        if ($product->is_on_sale) {
            $discount = $product->discount ?? 0;
            $product->pricesale = $product->price - ($product->price * $discount / 100);
        } else {
            $product->pricesale = $product->price;
        }
        $product->is_on_sale = $request->has('is_on_sale') ? 1 : 0;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->updated_at = now();
        $product->updated_by = Auth::id() ?? 1;
        $product->status = $request->status;
    
        // Xử lý ảnh nếu có upload mới
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('imagebook/product'), $filename);
            $product->image = 'imagebook/product/' . $filename;
        }
    
        $product->save();
    
        return redirect()->route('admin.product.list')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id)
     {
         $product = Product::find($id);
     
         if (!$product) {
             return redirect()->route('admin.product.trash')->with('error', 'Không tìm thấy product!');
         }
     
        $product->forceDelete();
     
         return redirect()->route('admin.product.trash')->with('success', 'product đã được xoá vĩnh viễn!');
     }
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.list');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;
        $product->save();

        return redirect()->route('admin.product.list')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        
        $product->restore();
    
        $product->status = 0;
        $product->save();
    
        return redirect()->route('admin.product.trash')->with('success', 'product đã được khôi phục!');
    }

    // Add the updateStatus method to handle status updates
    public function updateStatus($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.product.list')->with('error', 'không có tìm thấy sản phẩm!');
        }

        $product->status = ($product->status == 1) ? 0 : 1;
        $product->updated_at = now();
        $product->updated_by = Auth::id() ?? 1;

        $product->save();

        return redirect()->route('admin.product.list')->with('success', 'sửa trạng thái thành công!');
    }

}
