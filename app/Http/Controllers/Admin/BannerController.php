<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){{

        $banners = Banner::whereIn('status', [0, 1])->get();
        return view("admin.banner.list", compact("banners"));
    }}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $createbanner = Banner::where('status', '!=', '0');
        return view('admin.banner.create',compact('createbanner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $banner = new Banner;
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->sort_order = $request->sort_order;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        //upload file

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('imagebook/banner/'), $filename);
            $banner->image = 'imagebook/banner/'.$filename;
        }
        if ($banner->save()) {
            return redirect()->route('admin.banner.list')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công!']);
        }

        return redirect()->route('admin.banner.create')->with('message', ['type' => 'danger', 'msg' => 'Thêm thất bại!!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $banner = Banner::findOrFail($id);
        return view('admin.banner.show', compact('banner'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner = Banner::findOrFail($id);

        // Only update fields that are changed
        if ($request->has('name')) {
            $banner->name = $request->name;
        }
        if ($request->has('link')) {
            $banner->link = $request->link;
        }
        if ($request->has('position')) {
            $banner->position = $request->position;
        }
        if ($request->has('description')) {
            $banner->description = $request->description;
        }
        if ($request->has('sort_order')) {
            $banner->sort_order = $request->sort_order;
        }
        if ($request->has('status')) {
            $banner->status = $request->status;
        }

        // Only update image if a new one is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('imagebook/banner/'), $filename);
            $banner->image = 'imagebook/banner/'.$filename;
        }

        if ($banner->save()) {
            return redirect()->route('admin.banner.list')->with('message', ['type' => 'success', 'msg' => 'cập nhật thành công!']);
        }

        return redirect()->route('admin.banner.list')->with('message', ['type' => 'danger', 'msg' => 'cập nhật thất bại!!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.list');
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        $banner->save();

        return redirect()->route('admin.banner.trash')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }
    //
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
    
        if (!$banner) {
            return redirect()->route('admin.banner.trash')->with('error', 'Không tìm thấy banner!');
        }
    
        $banner->forceDelete();
    
        return redirect()->route('admin.banner.trash')->with('success', 'Banner đã được xoá vĩnh viễn!');
    }
    
    public function trashList(){
        $trashCount = Banner::where('status', '=', 2)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.banner.trash', compact('trashCount'));
    }

    public function restore($id)
    {
        $banner = Banner::withTrashed()->findOrFail($id);
        
        $banner->restore();
    
        $banner->status = 0;
        $banner->save();
    
        return redirect()->route('admin.banner.trash')->with('success', 'Banner đã được khôi phục!');
    }

    public function updateStatus($id){
        $banners = Banner::find($id);
    
        if (!$banners) {
            return redirect()->route('admin.banner.list')->with('error', 'không có tìm thấy sản phẩm!');
        }
    
        $banners->status = ($banners->status == 1) ? 0 : 1;
        $banners->updated_at = now();
        $banners->updated_by = Auth::id() ?? 1;
    
        $banners->save();
    
        return redirect()->route('admin.banner.list')->with('success', 'sửa trạng thái thành công!');
    }
}
