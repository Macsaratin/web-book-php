<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::whereIn('status', [0, 1])->get();
        return view('admin.brand.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        Log::info('StoreBrandRequest received', ['request' => $request->all()]);

        $brand = new Brand;
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order =$request-> sort_order;
        $brand->description = $request->description;
        $brand->created_at = now();
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('imagebook/brand'), $filename);
                $brand->image = 'imagebook/brand/'.$filename;

                // Debugging line
                Log::info('File uploaded successfully', ['filename' => $filename]);
            } else {
                // Debugging line
                Log::error('Uploaded file is not valid');
            }
        } else {
            // Debugging line
            Log::error('No file uploaded');
        }

        $brand->save();

        return redirect()->route('admin.brand.list')->with('success', 'brand thêm thành công');
    }

    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.show', compact('brand'));
    }

    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order =$request-> sort_order;

        $brand->description = $request->description;
        $brand->updated_at = now();
        $brand->updated_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('imagebook/brand'), $filename);
                $brand->image = 'imagebook/brand/'.$filename;

                Log::info('File uploaded successfully', ['filename' => $filename]);
            } else {
                Log::error('Uploaded file is not valid');
            }

        }

        $brand->save();

        return redirect()->route('admin.brand.list')->with('success', 'Brand cập nhật thành công');
    }

    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.trash')->with('error', 'Không tìm thấy thương hiệu!');
        }
        $brand->forceDelete();
        return redirect()->route('admin.brand.trash')->with('success', 'Thương hiệu đã bị xoá vĩnh viễn!');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.list');
        }
        $brand->status = 2;
        $brand->updated_by = Auth::id() ?? 1;
        $brand->updated_at = now();
        $brand->save();

        return redirect()->route('admin.brand.list')->with('success', 'Đã chuyển thương hiệu vào thùng rác!');
    }

    public function restore($id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->restore();
        $brand->status = 1;
        $brand->save();

        return redirect()->route('admin.brand.trash')->with('success', 'Khôi phục thương hiệu thành công!');
    }

    public function trash()
    {
        $brands = Brand::onlyTrashed()->orWhere('status', 2)->get();
        return view('admin.brand.trash', compact('brands'));
    }

    public function updateStatus($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('admin.brand.list')->with('error', 'Không tìm thấy thương hiệu!');
        }

        $brand->status = ($brand->status == 1) ? 0 : 1;
        $brand->updated_by = Auth::id() ?? 1;
        $brand->updated_at = now();
        $brand->save();

        return redirect()->route('admin.brand.list')->with('success', 'Cập nhật trạng thái thành công!');
    }
}
