@extends('layout.admin.layout')

@section('title', 'Chi tiết danh mục')

@section('content')
<x-admin.dashboard />

<div class="category-detail-container">
    <h2>Chi tiết danh mục</h2>
    <div class="detail-box">
        <p><strong>ID:</strong> {{ $category->id }}</p>
        <p><strong>Tên danh mục:</strong> {{ $category->category_name }}</p>
        <p><strong>Slug:</strong> {{ $category->slug }}</p>
        <p><strong>Mô tả:</strong> {{ $category->description }}</p>
        <p><strong>Trạng thái:</strong> 
            @if ($category->status == 1)
                <span class="text-success">Hiển thị</span>
            @else
                <span class="text-danger">Ẩn</span>
            @endif
        </p>
        <a href="{{ route('admin.category.list') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
    </div>
</div>

<style>
.category-detail-container {
    max-width: 600px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
    color: black;
}

.detail-box p {
    font-size: 16px;
    margin-bottom: 10px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.text-success {
    color: green;
}

.text-danger {
    color: red;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
}
.btn-secondary:hover {
    background-color: #5a6268;
}
</style>
@endsection
