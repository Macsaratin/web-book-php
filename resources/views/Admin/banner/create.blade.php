@extends('layout.admin.layout')
@section('title', 'thêm banner')
@section('content')
@props(['createbanner'])

<x-admin.dashboard />
<div class="banner-container">
    <h2  style="color: #5a6268;" class=" text-center">Thêm Banner</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Tên Banner -->
        <div class="form-group">
            <label for="name">Tên Banner</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Hình ảnh -->
        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>

        <!-- Mô tả -->
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <!-- Liên kết -->
        <div class="form-group">
            <label for="link">Liên kết</label>
            <input type="url" name="link" id="link" class="form-control">
        </div>

        <!-- Vị trí -->
        <div class="form-group">
            <label for="position">Vị trí</label>
            <input type="number" name="position" id="position" class="form-control" required>
        </div>

        <!-- Trạng thái -->
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="1">Hoạt động</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        <!-- Nút submit -->
        <button type="submit" class="btn btn-primary">Thêm Banner</button>
        <a href="{{ route('admin.banner.list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<style>
.banner-container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background: white;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
    color: black;
}

label {
    font-weight: bold;
}

.form-control {
    border-radius: 8px;
    padding: 10px;
}

.btn {
    border-radius: 6px;
    font-size: 16px;
    padding: 10px 20px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection
