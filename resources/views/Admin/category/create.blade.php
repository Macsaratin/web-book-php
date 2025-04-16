@extends('layout.admin.layout')
@section('title', 'Admin')
@props(['createCategory'])
@section('content')
<x-admin.dashboard />

<div class="create-container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Thêm Danh Mục</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name">Tên danh mục</label>
                            <input type="text" value="{{ old('category_name') }}" name="category_name" id="category_name"
                                class="form-control">
                            @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="parent_id">Cấp cha</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">Cấp cha</option>
                                {!! $htmlparentid !!}
                            </select>
                            @error('parent_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sort_order">Sắp xếp</label>
                            <select name="sort_order" id="sort_order" class="form-control">
                                <option value="">Chọn vị trí</option>
                                {!! $htmlsortorder !!}
                            </select>
                            @error('sort_order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Thêm danh mục</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Container chính */

/* Card */
.card {
    border-radius: 12px;
    overflow: hidden;
    border: none;
}

.card-header {
    font-size: 20px;
    font-weight: bold;
    background: #007bff;
    text-align: center;
    padding: 15px;
}

/* Label */
label {
    font-weight: 600;
    color: #333;
}

/* Form control */
.form-control {
    border-radius: 8px;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ced4da;
    transition: all 0.3s ease-in-out;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.3);
}

/* Button */
.btn {
    border-radius: 8px;
    font-size: 16px;
    padding: 10px 20px;
    transition: all 0.3s ease-in-out;
}

/* Nút Thêm */
.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

/* Nút Quay lại */
.btn-secondary {
    background-color: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* File input */
.form-control-file {
    border: 1px solid #ced4da;
    padding: 8px;
    border-radius: 8px;
    width: 100%;
}

/* Responsive */
@media (max-width: 768px) {
    .create-container {
        max-width: 95%;
        padding: 15px;
    }

    .btn {
        width: 100%;
    }
}
</style>

@endsection
