<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::whereIn('status', [0, 1])->get();
        return view("admin.category.list", compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $createCategory = Category::where('status' ,'!=','0')
                            -> orderBy('created_at','desc')
                            ->select('id', 'image', 'category_name', 'parent_id', 'slug', 'description', 'sort_order', 'status')
                            ->get();
        $htmlparentid= '';
        $htmlsortorder='';
        foreach($createCategory as $item ){
            $htmlparentid .= "<option value='".$item->id."'>".$item->category_name.'</option>';
            $htmlsortorder .= "<option value='".$item->sort_order."'>".$item->category_name.'</option>';
        }

        return view('admin.category.create', compact('createCategory', 'htmlparentid', 'htmlsortorder'));
    }
    //


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->slug = Str::of($request->category_name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->description = $request->description;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('imagebook/category'), $filename);
            $category->image = 'imagebook/category/'.$filename;
        }
        if ($category->save()) {
            return redirect()->route('admin.category.list')->with('success', 'Category thêm thành công!');
        } else {
            return redirect()->route('admin.category.create')->with('error', 'thêm category thất bại .');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
        $editCategory = Category::find($id);
        if (! $editCategory) {
            return redirect()->route('admin.category.list')->with('error', 'Category không tồn tại.');
        }

        $list = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlparentid = '';
        $htmlsortorder = '';
        foreach ($list as $item) {
            $selectedParent = $item->id == $editCategory->parent_id ? 'selected' : '';
            $htmlparentid .= "<option value='".$item->id."' $selectedParent>".$item->category_name.'</option>';
        
            $selectedSort = $item->sort_order == $editCategory->sort_order ? 'selected' : '';
            $htmlsortorder .= "<option value='".$item->sort_order."' $selectedSort>".$item->category_name.'</option>';
        }
        

        return view('admin.category.edit', compact('editCategory', 'htmlparentid', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (! $category) {
            return redirect()->route('admin.category.index')->with('error', 'Category không tồn tại.');
        }

        $category->category_name = $request->category_name;
        $category->slug = Str::of($request->category_name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->description = $request->description;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('imagebook/category'), $filename);
            $category->image = 'imagebook/category/'.$filename;
        }

        if ($category->save()) {
            return redirect()->route('admin.category.list')->with('success', 'Category cập nhật thành công!');
        } else {
            return redirect()->route('admin.category.list')->with('error', 'Cập nhật category thất bại.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->route('admin.category.trash')->with('error', 'Không tìm thấy category!');
        }
    
       $category->forceDelete();
    
        return redirect()->route('admin.category.trash')->with('success', 'category đã được xoá vĩnh viễn!');
    }
   public function delete($id)
   {
       $category = Category::find($id);
       if ($category == null) {
           return redirect()->route('admin.category.list');
       }
       $category->status = 2;
       $category->updated_at = date('Y-m-d H:i:s');
       $category->updated_by = Auth::id() ?? 1;
       $category->save();

       return redirect()->route('admin.category.list')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
   }
   public function restore($id)
   {
       $category = Category::withTrashed()->findOrFail($id);
       
       $category->restore();
       $category->status = 0;
       $category->save();
   
       return redirect()->route('admin.category.trash')->with('success', 'category đã được khôi phục!');
   }

   // Add the updateStatus method to handle status updates
   public function updateStatus($id)
   {
       $category = Category::find($id);

       if (!$category) {
           return redirect()->route('admin.category.list')->with('error', 'không có tìm thấy sản phẩm!');
       }

       $category->status = ($category->status == 1) ? 0 : 1;
       $category->updated_at = now();
       $category->updated_by = Auth::id() ?? 1;

       $category->save();

       return redirect()->route('admin.category.list')->with('success', 'sửa trạng thái thành công!');
   }
    public function trashcountcategory()
    {
        $trashCount = Category::where('status', '=', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.category.trash', compact('trashCount'));
    }
}
