@props(['products', 'htmlcategoryid', 'htmlbrandid'])
@extends('layout.admin.layout')
@section('title', 'Admin')
@section('content')
<x-admin.dashboard/>

<div class="d-flex">
    <!-- Nội dung chính -->
    <div class="product-list-container mt-5" style="margin-left: 170px; width: calc(100% - 240px);">
        <h2 class="text-center mb-4">Danh Sách Sản Phẩm</h2>
        <!-- Nút điều khiển -->
        <div class="d-flex justify-content-center mb-3">
            <a href="{{ route('admin.product.trash') }}" class="btn btn-warning mx-2">
                <i class="bi bi-trash"></i> Thùng rác
            </a>
            <a href="{{ route('admin.product.create') }}" class="btn btn-success mx-2">
                <i class="bi bi-plus-circle"></i> Thêm sản phẩm
            </a>
        </div>
        <!-- Bảng danh sách sản phẩm -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Giá gốc</th>
                        <th>Sale</th>
                        <th>Giảm giá</th>
                        <th>Giá Sale</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->id }}</td>
                        <td class="text-start">{{ $product->name }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="60">
                            @endif
                        </td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                        <td class="text-danger fw-bold">{{ $product->is_on_sale ? 'Có' : 'Không' }}</td>
                        <td class="text-danger fw-bold">{{ $product->discount }}%</td>
                        <td>{{ number_format($product->pricesale, 0, ',', '.') }} VND</td>
                        <td>
                            <a href="{{ route('admin.product.updateStatus', $product->id) }}" class="btn btn-sm 
                                @if($product->status == 1) btn-success @else btn-danger @endif">
                                @if($product->status == 1) 
                                    <i class="bi bi-toggle-on"></i> 
                                @else 
                                    <i class="bi bi-toggle-off"></i>
                                @endif
                            </a>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Xem
                                </a>
                                <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" 
                                      onsubmit="return confirm('Bạn có chắc muốn xóa và đưa vào thùng rác không?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Xoá
                                    </button>   
                                </form>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Sửa
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Phân trang -->
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>

<style>
.product-list-container {
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: black;
}

h2 {
    text-align: center;
}

.button-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 5px;
    gap: 3px;
}

.button-group {
    display: flex;
    gap: 3px;
    justify-content: center;
}

button {
    background-color: #e53e3e;
    color: white;
    padding: 5px 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #c53030;
}

button {
    cursor: pointer;
}

.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 5px;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

.product-img {
    width: 80px;
    height: auto;
    border-radius: 5px;
}

td:nth-child(6), td:nth-child(7) {
    font-weight: bold;
}

.text-green {
    color: green;
}

.text-red {
    color: red;
}
</style>
@endsection