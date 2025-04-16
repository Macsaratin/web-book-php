@extends('layout.admin.layout')
@section('title', 'Admin')
@section('content')
    <x-admin.dashboard />
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0">Chi tiết sản phẩm</h2>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4">{{ $product->name }}</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <strong>Danh mục:</strong> {{ $product->category->category_name ?? 'N/A' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Thương hiệu:</strong> {{ $product->brand->name ?? 'N/A' }}
                                </div>
                                <div class="mb-3">
                                    <strong>Giá:</strong> {{ number_format($product->price, 0, ',', '.') }} đ
                                </div>
                                @if($product->is_on_sale)
                                    <div class="mb-3">
                                        <strong>Giá khuyến mãi:</strong> 
                                        <span class="text-danger">{{ number_format($product->pricesale, 0, ',', '.') }} đ</span>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <strong>Số lượng:</strong> {{ $product->qty }}
                                </div>

                                <div class="mb-3">
                                    <strong>Trạng thái:</strong> 
                                    <span class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-secondary' }} px-2 py-1">
                                        {{ $product->status == 1 ? 'Hiển thị' : 'Ẩn' }}
                                    </span>
                                </div>
                                <div class="mb-3 text-center">
                                    <strong>Hình ảnh:</strong>
                                    <div class="mt-2">
                                        @if($product->image)
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                                                 class="img-fluid rounded shadow-sm" style="max-width: 250px;">
                                        @else
                                            <p class="text-muted">Không có hình ảnh</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light text-center">
                        <a href="{{ route('admin.product.list') }}" class="btn btn-primary px-4">Quay lại danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .card-header {
            padding: 15px;
        }
        .card-body {
            background-color: #fff;
        }
        .description {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            line-height: 1.6;
        }
        .btn-primary {
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        img {
            transition: transform 0.3s ease;
        }
        img:hover {
            transform: scale(1.05);
        }
    </style>
@endsection