@extends('layout.admin.layout')
@section('title', 'Sửa banner')
@section('content')

<x-admin.dashboard />
<div class="banner-container">
    <h2 class="text-center" style="color: #5a6268;">Sửa Banner</h2>

    @if(session('message'))
        <div class="alert alert-{{ session('message.type') }}">{{ session('message.msg') }}</div>
    @endif

    <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tên Banner -->
        <div class="form-group">
            <label for="name">Tên Banner</label>
            <input type="text" name="name" id="name" value="{{ $banner->name }}" class="form-control" required>
        </div>

        <!-- Hình ảnh -->
        <div class="form-group">
            <label for="image">Hình ảnh</label><br>
            @if($banner->image)
                <img src="{{ asset($banner->image) }}" alt="Banner" style="max-width: 200px; margin-bottom: 10px;">
            @endif
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <!-- Mô tả -->
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ $banner->description }}</textarea>
        </div>

        <!-- Liên kết -->
        <div class="form-group">
            <label for="link">Liên kết</label>
            <input type="url" name="link" id="link" value="{{ $banner->link }}" class="form-control">
        </div>

        <!-- Vị trí -->
        <div class="form-group">
            <label for="position">Vị trí</label>
            <input type="number" name="position" id="position" value="{{ $banner->position }}" class="form-control" required>
        </div>

        <!-- Trạng thái -->
        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>

        <!-- Nút submit -->
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.banner.list') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

{{-- Style giữ nguyên như file create --}}
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
