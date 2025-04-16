@extends('layout.admin.layout')
@section('title', 'Chi Tiết Thương Hiệu')
@section('content')
    <x-admin.dashboard />
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-info text-white text-center">
                        <h2 class="mb-0">Chi Tiết Thương Hiệu</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tên thương hiệu:</label>
                            <p class="form-control-plaintext">{{ $brand->name }}</p>
                        </div>

                        <div class="mb-3 text-center">
                            <label class="form-label fw-bold d-block">Hình ảnh:</label>
                            @if($brand->image)
                                <img src="{{ asset($brand->image) }}" alt="Brand Image" class="img-fluid rounded shadow-sm" style="max-width: 150px;">
                            @else
                                <p class="text-muted">Không có hình ảnh</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Mô tả:</label>
                            <p class="form-control-plaintext">{{ $brand->description ?? 'Không có mô tả' }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Thứ tự sắp xếp:</label>
                            <p class="form-control-plaintext">{{ $brand->sort_order }}</p>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Trạng thái:</label>
                            <p class="form-control-plaintext">
                                @if($brand->status == 1)
                                    <span class="badge bg-success">Hiển thị</span>
                                @else
                                    <span class="badge bg-secondary">Ẩn</span>
                                @endif
                            </p>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('admin.brand.list') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Quay lại danh sách
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 10px;
        }
        .form-control-plaintext {
            padding-left: 0;
            color: #2d3748;
        }
    </style>
@endsection
